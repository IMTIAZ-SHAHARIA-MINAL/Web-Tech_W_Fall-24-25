<?php

class Book {
    private $title;
    private $author;
    private $year;

    // Constructor to initialize properties
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    // Method to return book details
    public function getDetails() {
        return "Title: $this->title, Author: $this->author, Year: $this->year";
    }
}

// Creating object of Book class
$book1 = new Book("Harry Potter", "J.K. Rowling", 1997);

// Displaying details
echo $book1->getDetails();

?>
