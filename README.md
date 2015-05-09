# StudentCourses

Included Files:

1. login.php - Login screen with boxes for username and password, submit button, and a link for signup.php. Checks logins.txt to see if info entered exists. If true, logs the user into a new $_SESSION. If not, returns an error.

2. logins.txt - Registered students' ID and passwords

3. signup.php - Fields for entering ID (integer), First / Last name, password, and major. Takes data and writes it into studentInfo.txt.

4. studentInfo.txt - Registered students' ID, First Name, Last Name, Major, and slots for up to 3 enrolled courses.

5. courses.txt - Contains course information: Course ID, course name, max number of students who can enroll, and number currently enrolled.

5. courses.php - Displays current logged in user's information as well as a table of the courses that are not full (doesn't display a course if max students equals those currently enrolled). The user can select via checkbox which courses they would like to enroll in (minimum of one, maximum of three). Upon submitting, their data in studentInfo.txt is updated with their 1-3 courses and the page is updated with the new data, and the currently enrolled number of that course is incremented by 1. This page is not accessible unless logged in. A logout link is also provided.

5. logs.txt - contains timestamps for each time a user logs into the service
