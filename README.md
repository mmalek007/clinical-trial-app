Subject Screening Tool
======================
This project is a web-based subject screening tool for a clinical trial, developed using Laravel. It includes a screening form, a results page, and a small database to store screening data.

Prerequisites
=============
Before you begin, ensure you have the following installed:

1)Docker
2)Docker Compose

Setup Instructions
==================
1.Clone the repository to your local machine:
git clone https://github.com/mmalek007/clinical-trial-app.git

2.Navigate to the project directory:

cd clinical-trial-app

3.Build the Docker images and start the containers:

docker-compose up -d --build

4.The application should now be accessible at http://localhost:8080.

If shown "This site can’t be reached" then please wait for few minute.

Usage
=====
-Navigate to http://localhost:8080 in your web browser to access the subject screening tool.

-Landing page will show Subject Screening Data

-Click on "New Subject" button

-Fill out the screening form with the required information.

-Submit the form to determine the subject's eligibility for the clinical trial.

-View the results page to see the eligibility status and cohort assignment.

-Go to Home page and see all records for Subject Screening
