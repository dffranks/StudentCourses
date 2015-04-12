PHP – Major Project 3 (Pseudo-code)
Ben Williams & Daniel Franks

Files:
1. logins.txt - UsrId : passWord
2. courses.txt - cId, cName, cSize, numEnrolled 
3. logs.txt - usrId, time
4. studentInfo.txt - usrId, name, major, coursesTaken

$_SESSION variables
-->$user


FIRST
   -->login.html

SECOND
   login
   -->courses.html

   signUp
   -->signUp.html
      -->login.html

THIRD
-->courses.html
   -->login.html

**********
login.html
**********
~~-->input usrName~~
~~-->input passWord~~
~~-->b.Submit~~
   ~~-->take usrName + passWord~~
   ~~-->match to line in studentInfo.txt~~
      ~~--> if (match) {~~
               ~~-->set $_SESSION['user'] to input.usrName~~
               -->build student{}
                  -->match usrId in studentInfo.txt
                  -->place data into student{}
               ~~-->courses.html~~
            ~~} else {~~
               ~~-->alert("Invalid ...")~~
            ~~}~~

-->b.signUp
   -->signUp.html

***********
signUp.html
***********
-->inputs userId, passWord, name, major
-->b.submit
   -->write info to studentInfo.txt
      -->usrId, name, passWord, major, courseTaken = [null, null, null]
   -->write info to logins.txt
      -->usrId, passWord
   -->login.html

************
courses.html
************
~~-->echo student{properties}~~
-->echo available courses
   -->scan courses.txt
      -->courseListing()
-->place checkBox next to each course listed
-->b.submit
   -->check student{} number of courses
      -->update student{cId, cId, cId}
      -->write new data to studentInfo.txt
      -->write new data to courseListing.txt
   -->echo updated studentInfo
   -->rewrite course listing
      -->scan courses.txt
         -->courseListing()
~~-->b.logout~~
   ~~-->clear $_SESSION["user"]~~
   ~~-->go to login screen~~

_________
student{
_________
-->get usrId from logins.txt
-->match usrId in studentInfo.txt
   usrId-->
   name-->
   major-->
   coursesTaken-->[null,null,null]
}
++++++++++++++++++++++++
function courseListing() {
++++++++++++++++++++++++
-->scan courses.txt
   -->for each course in courses.txt-->if (numEnrolled < cSize) {
                           course should be echoed
                         }
-->scan student{}
   -->for each course in student{}
                         if (cId != student.coursesTaken){
                           course should be echoed
                         }
}

+++++++++++++++++++++++++++++++++++
function validateCourseSubmission() {
+++++++++++++++++++++++++++++++++++
-->if student{ has 3 or fewer coursesTaken }
       return true;
    } else {
       return error (3 or fewer classes, please)
    }