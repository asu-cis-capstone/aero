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
![Application Diagram](https://lh6.googleusercontent.com/hNj1bwtbycZuq9_AjxoiW_K2fFTD5VvtQd9KT-KI7JDNxstDA7BDRt0NP6rPL45zrUThT4UOJ1Y=w2124-h1075)
#List of Contributors 
Andrew Hollingsworth,
Peggy Chen,
Jose Arballo,
Ethan Selin,
Nitin Jain
#Release Notes 
  v0.1
