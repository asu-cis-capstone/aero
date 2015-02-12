# aero [![Stories in Ready](https://badge.waffle.io/asu-cis-capstone/aero.svg?label=ready&title=Ready)](http://waffle.io/asu-cis-capstone/aero)
#Overview/Company Info
  Aeroapps Technology was founded by Bryan Tregila and Ed Gonzalez. It is a company that primarily focuses on developing customized iOS and web application for the aviation industry. It also provides Reva SMS Forms Manager that help flight crews to complete and submit their flight risk assessments and safety reports. It also created interactive aircraft instrument panel for student pilots who are preparing for FAA exams to learn aircraft systems. Aeroapps is asking for an adaptive learning mobile application to be built for them that will integrate a database that we will also create to facilitate the certification process for pilots in training. 
#Database Requirements
  The database will comprise of data and information already provided to us by Aeroapps. The primary data to be integrated includes: FAA Handbooks and Manuals, FAA question bank for testing, aircraft performance tables, aircraft weight & balance tables, and airport information. The FAA question bank is currently located on an Excel file. This Excel file must be transferred, preferably on MySQL, so that it may be accessed through the backend server with ease. Any documents uploaded to the database will be accessed through a web portal where admin users have the ability to add, delete, or modify documents. Interfacing with the backend server requires access to: NOAA Text Dataserver, FAA Aeronautical Information Data Access Portal, and the U.S. Government Printing Office. XML parsing and reading will be required to convert data into usable structures by several clients and users. 
#Mobile Application Requirements
  The mobile application will be built for iOS 7 and up devices, such as an iPad or iPhone. Aeroapps prefers for us to code the application in the language of Swift or Objective-C. This app will be the all-in-one interface that allows pilots in training to excel with their learning. The app will take the form a quizzing program that will include five primary functions or pages: Learn, Practice, Exam, Library, and Statistics. 
#
  The Learn function will give access to the following topics containing required knowledge for the exam: Aeronautical Decision Making, Aeromedical, Communications, Emergency Operations, Flight Technique, Flight Theory, Navigation, Performance, Regulations, Special Emphasis Areas, Systems, Weather, and Weather Services. Users may select sub-topics to narrow the scope of their learning session and will also be given progress reports to keep track of what topics and sub-topics have been accessed. 
#
  The Practice function will serve as the quiz that will ultimately prepare the user for the exam. This function allows customization of the number of questions asked in a single quizzing session and what topics or sub-topics will be covered. This experience allows the user to engage in adaptive learning rather than monotonous memorization. 
#
  The Exam function will simulate the conditions of the real exam so that a user may understand what is expected of him or her. This function does not allow customization of any kind and fully re-creates a timed exam environment. Conditions regarding time and number of questions will vary depending on the type of pilot certificate that is being practiced for. At the end of an exam session, the user will be given the opportunity to review missed questions to see explanations of the correct answers. 
#
  The Library function serves as a direct interface to the database containing official publications. The user will be allowed to browse or search one or more of these publications relevant to the exam. These publications include: FAA Handbooks, the Aeronautical Information Manual (AIM), and Federal Aviation Regulations (CFR Title 14).
#
  Finally, the Statistics function will act as a progress tracker for the user, offering pass statistics in percentages regarding the following categories: Question bank type, Session type (practice and exam), Topic, and Sub-topic. The function shall also allow the user to create and e-mail PDF reports.
#Mobile Application Schema
![Application Diagram](https://qktc3w.by3302.livefilestore.com/y2plPbLpvsLmTI8_TiIJTv3pNsQvsvVzZA4z1PITNg6ElCV7oplCn6Lx4T-q9bd8T9Wiv4boSYbdV-iAEdNFfvDxZxYZlQ8a2_fHVuud60Znhd3ApWe6h2cg8rkW9bBDONq_H9p0us81JC50ZJhBfERKA/AeroMenuStructure.jpg?psid=1)
#How to Use Provided Files
  The provided files for your web portal will be provided within our repository. Files with extensions of .html and .css can be downloaded and placed into your web host. It is recommended to create a folder structure in an organized manner that will differentiate different file types or functions of the website. For example, CSS files should be placed in a folder called "stylesheets" and JavaScript should be placed in a "javascript" folder. The code for all files can be easily copied and pasted into your html/css editor. 
#
SQL files will be provided for your database. This file will include CREATE table statements to initialize variables and fields for the basic structure of your database. These statmenents must be copied into a query and once it is executed, the database will carry out those specified functions. 
#
When connecting to MySQL, you will connect to the database with the following credentials:
Host: aeroappstechnology.com
Port: 3306
UserName: first initial and last name
Password: [HIDDEN]
#Suggestions For Help
  Part of this product will require a mobile application for iOS. Our team has some experience with coding languages, such as C#, HTML, CSS, JavaScript, and SQL. Although we will take up the challenge for learning Swift or Objective-C, any assistance or guidance will be greatly appreciated.
#List of Contributors 
Andrew Hollingsworth,
Peggy Chen,
Jose Arballo,
Ethan Selin,
Nitin Jain
#Release Notes 
  v0.1
