<?php

    function get_user_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "select count(*) as user_count from user";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($query_run)){
            $count = $row['user_count'];
        }
        return($count);
    }

    function get_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "select count(*) as book_count from book";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($query_run)){
            $count = $row['book_count'];
        }
        return($count);
    }

    function get_category_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "select count(*) as cat_count from category";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($query_run)){
            $count = $row['cat_count'];
        }
        return($count);
    }

    function get_author_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "select count(*) as author_count from author";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($query_run)){
            $count = $row['author_count'];
        }
        return($count);
    }

    function get_issued_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "select count(*) as issued_count from issued_book";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($query_run)){
            $count = $row['issued_count'];
        }
        return($count);
    }

?>