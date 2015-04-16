<?php
   class Student {
      private $studentId = 0;
      private $studentFname = "";
      private $studentLname = "";
      private $studentMajor = "";
      private $courseOne = "";
      private $courseTwo = "";
      private $courseThree = "";

      function __construct($id, $fname, $lname, $maj, $c1, $c2, $c3){
         setId($id);
         setFname($fname);
         setLname($lname);
         setMaj($maj);
         setC1($c1);
         setC2($c2);
         setC3($c3);
      }

      function setId($id) {
         $this->studentId = $id;
      }
      function setFname($fname) {
         $this->studentFname = $fname;
      }
      function setLname($lname) {
         $this->studentLname = $lname;
      }
      function setMaj($maj) {
         $this->studentMajor = $maj;
      }
      function setC1($c1) {
         $this->courseOne = $c1;
      }
      function setC2($c2) {
         $this->courseTwo = $c2;
      }
      function setC3($c3) {
         $this->courseThree = $c3;
      }

      function getId() {
         return $this->studentId;
      }
      function getFname() {
         return $this->studentFname;
      }
      function getLname() {
         return $this->studentLname;
      }
      function getMaj() {
         return $this->studentMajor;
      }
      function getC1() {
         return $this->courseOne;
      }
      function getC2() {
         return $this->courseTwo;
      }
      function getC3() {
         return $this->courseThree;
      }

   }
?>
