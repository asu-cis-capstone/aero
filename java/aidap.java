/***********************************************************************
/
/** AidapRequest.java */
/***********************************************************************
/
/** This is intended to be a simple demonstration of how to make a */
/** simple query (weather or NOTAM) to AIDAP by reading a request file,*/
/** using PKI client certificates and GZIP compression in a Java */
/** application. */
/** ****** USE AT YOUR OWN RISK! ******** */
/***********************************************************************
/
/** History Log */
/** */
/** MR/TR Number Date Release Programmer/Description */
/**--------------------------------------------------------------------*/
/** CQ0541 2007/10/18 2.1 L Hostnick/simple program to*/
/** aide in testing,and as a */
/** query example */
/***********************************************************************
*/
package AidapRequest;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.security.KeyStore;
import java.security.cert.CertificateException;
import java.security.cert.X509Certificate;
import java.util.zip.GZIPInputStream;
import javax.net.ssl.HostnameVerifier;
import javax.net.ssl.HttpsURLConnection;
import javax.net.ssl.KeyManagerFactory;
import javax.net.ssl.SSLContext;
import javax.net.ssl.SSLSession;
import javax.net.ssl.SSLSocketFactory;
import javax.net.ssl.TrustManager;
import javax.net.ssl.X509TrustManager;

public class AidapRequest {
	static String POST = "POST";
	static String TYPE = "Content-type:";
	static String LEN = "Content-length:";
	static String ENC = "Accept-Encoding:";
	static String testcaseDir = "c:\\aidap\\testcase\\requests";
	static String resultsDir = "c:\\aidap\\testcase\\results";
	static String testcaseFile = "";
	
	// static variables
	static String urlString = "";
	
	// instance variables
	boolean useGZIP = true;
	static String postLine = "";
	static String typeLine = "";
	static String lenLine = "";
	static String encodeLine = "";
	static String queryLine = "";
	static String keyStorePath = "aidapuser.pfx";
	static String keyStorePswd = "password";
	/**
	* Main Method
	* @param args
	*/
	public static void main(String args[]) {
		if (!(args.length == 1)) {
			System.err.println("Argument value missing");
			System.exit(-1);
		}
		
		testcaseFile = args[0];
		if (!readTC()) {
		System.exit(-1);
		}
		
		HttpURLConnection c = null;
		BufferedOutputStream bos = null;
		InputStream is = null;
		URL url = null;
		
		try {
		// Setup connection
		System.err.println("Accessing - " + urlString);
		urlString = postLine.substring(postLine.indexOf(POST) + POST.length(),
		postLine.indexOf("HTTP")).trim();
		url = new URL(urlString);
		
		// HTTPS connection
		c = (HttpURLConnection) url.openConnection();
		
		// HTTPS (with client certificate)
		if (c instanceof HttpsURLConnection) {
		
			// take care of server certificate does match hostname
			HostnameVerifier hv = new HostnameVerifier() {
			
				public boolean verify(String hostname,
					SSLSession session) {
				return true;
				}
				
				public boolean verify(String hostname, String temp) {
					return true;
				}
			};
			
			((HttpsURLConnection) c).setHostnameVerifier(hv);
			
			// set to always trust the server
			X509TrustManager tm = new X509TrustManager() {
			
				public void checkClientTrusted(X509Certificate[] arg0,
					String arg1)
					throws CertificateException {
				}
				
				public void checkServerTrusted(X509Certificate[] arg0,
					String arg1)
					throws CertificateException {
				}
				
				public X509Certificate[] getAcceptedIssuers() {
					return new X509Certificate[0];
				}
				
				public boolean isClientTrusted(X509Certificate[] arg0) {
					return true;
				}
				
				public boolean isServerTrusted(X509Certificate[] arg0) {
					return true;
				}
			};
// use the client certificate
KeyStore ks = KeyStore.getInstance("PKCS12");
ks.load(new FileInputStream(new File(keyStorePath)),
keyStorePswd.toCharArray());
KeyManagerFactory kmf =
KeyManagerFactory.getInstance("SunX509");
kmf.init(ks, keyStorePswd.toCharArray());
// Set socket context and setup socket factory
SSLContext context = SSLContext.getInstance("TLS");
context.init(kmf.getKeyManagers(),
new TrustManager[]{tm},
null);
SSLSocketFactory sockFactory = context.getSocketFactory();
((HttpsURLConnection) c).setSSLSocketFactory(sockFactory);
} else {
System.err.println("Go - else not https");
}
// Set up request parameters
c.setAllowUserInteraction(false);
c.setDoInput(true);
c.setDoOutput(true);
c.setUseCaches(false);
c.setRequestProperty(typeLine.substring(0, typeLine.indexOf(":")).trim(),
typeLine.substring(typeLine.indexOf(":") + 1).trim());
if (!encodeLine.equals("")) {
c.setRequestProperty(encodeLine.substring(0, encodeLine.indexOf(":")).trim(),
encodeLine.substring(encodeLine.indexOf(":") + 1).trim());
}
c.setRequestMethod(POST);
if (queryLine == null || queryLine.length() == 0) {
c.setRequestMethod("GET");
}
// Connect to server
System.err.println("Connecting to server...");
c.connect();
System.err.println("Send request to server");
// Write HTTP Request
if (queryLine.length() > 0) {
bos = new BufferedOutputStream(c.getOutputStream());
byte[] buf = queryLine.getBytes();
bos.write(buf, 0, buf.length);
bos.flush();
}
//Read HTTP Response
System.err.println("Read response from server...");
is = new BufferedInputStream(c.getInputStream());
// read-in appropriately based on whether returned data
// has content encoding gzip
String contentEncoding = c.getContentEncoding();
if (contentEncoding != null && contentEncoding.equalsIgnoreCase("gzip")) {
try {
if (is.markSupported()) {
is.mark(2);
}
is = new GZIPInputStream(is);
} catch (IOException e) {
if (is.markSupported()) {
is.reset();
}
is = new BufferedInputStream(is);
}
}
// Read the response in
System.out.println("Starting read");
byte[] buff = new byte[8192];
int numOfBytes;
boolean downloading = true;
int loaded = 0;
FileOutputStream fileWriter = new FileOutputStream(resultsDir + "\\" +
testcaseFile + "_out.txt");
System.out.println("Start write");
while ((numOfBytes = is.read(buff)) > 0) {
fileWriter.write(buff, 0, numOfBytes);
}
fileWriter.close();
System.err.println("End of run");
} catch (IOException e) {
System.err.println("io error: " + e.getMessage());
e.printStackTrace();
} catch (Exception e) {
System.err.println("exception: " + e.getMessage());
e.printStackTrace();
} finally {
// Close input stream
if (is != null) {
try {
is.close();
} catch (IOException e) {
}
is = null;
}
// Close output stream
if (bos != null) {
try {
bos.close();
} catch (IOException e) {
}
bos = null;
}
// Close connection
if (c != null) {
c.disconnect();
c = null;
}
}
} //end of go()
/***********************************************************************
/
/** readTC */
/** Reqd the request from the test case file, and parse the pieces. */
/***********************************************************************
/
/** Modifications: */
/** PR Number Date Release Programmer/Description */
/**--------------------------------------------------------------------*/
/** initial 2004/06/05 New E Hwang */
/***********************************************************************
/
private static boolean readTC() {
String lastLine = "";
String line;
try {
File configFile = new File(testcaseDir, testcaseFile);
/* Example
POST /aidap/<servlet name> HTTP/1.1
Content-type: application/x-www-form-urlencoded
Accept-Encoding: gzip
Content-length: <input_parameter’s length>
<a blank line>
uid=uid&password=upassword&&type=a&active=y
*/
if (!configFile.exists()) {
return false;
}
System.out.println(configFile.getName());
BufferedReader in = new BufferedReader(new FileReader(configFile));
while ((line = in.readLine()) != null) {
if (line.startsWith(POST)) {
postLine = line.trim();
}
if (line.startsWith(TYPE)) {
typeLine = line.trim();
}
if (line.startsWith(LEN)) {
lenLine = line.trim();
}
if (line.startsWith(ENC)) {
encodeLine = line.trim();
}
lastLine = line.trim();
}
// must have action, uid, password, and type
if (postLine.length() == 0 || typeLine.length() == 0 || lenLine.length() == 0) {
System.err.println("Required argument missing");
return false;
}
if (lastLine.startsWith(POST) || lastLine.startsWith(TYPE) ||
lastLine.startsWith(LEN) || lastLine.equals("")) {
System.err.println("Missing a request parameter");
return false;
}
queryLine = lastLine;
return true;
} catch (Exception e) {
System.err.println("Error finding and/or reading" + testcaseDir + "\\" +
testcaseFile);
return false;
}
} //end of getUsageText()
}