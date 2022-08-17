<?php
  //Creating an object ($dom) to store XML in PHP
  $dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true; //This property would format the XML output

  //Creating the root element and adding it to the DOM object
  // $dom->appendChild($dom->createElement('student'));
  $student = $dom->createElement('student');
  $dom->appendChild($student);
  // Appending the above created $root to the object creates the following: <student></student>

  //Adding the course to the root (student)
  $course = $dom->createElement('course');
  $student->appendChild($course);
  // Appending the above created $course to the object creates the following: <student><course></course></student>
  // Setting the attribute course='1'
  $course->setAttribute('course', 'Web Services');

  //Adding details to the web services course
  $teacher = $dom->createElement('teacher', 'Jeevesh');
  $courseCode = $dom->createElement('courseCode', '920-941-VA');
  $numberOfStudents = $dom->createElement('numberOfStudents', '21');
  $course->appendChild($teacher);
  $course->appendChild($courseCode);
  $course->appendChild($numberOfStudents);

  //Adding the course to the root (student)
  $course = $dom->createElement('course');
  $root->appendChild($course);
  // Appending the above created $course to the object creates the following: <student><course></course></student>
  // Setting the attribute course='2'
  $course->setAttribute('course', 'Java');

  //Adding details to the Java course
  $teacher = $dom->createElement('teacher', 'Alex');
  $courseCode = $dom->createElement('courseCode', '920-900-VA');
  $numberOfStudents = $dom->createElement('numberOfStudents', '21');
  $course->appendChild($teacher);
  $course->appendChild($courseCode);
  $course->appendChild($numberOfStudents);

  echo $dom->saveXML();
?>