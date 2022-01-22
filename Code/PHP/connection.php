<?php

  session_start();

  define("SERVER", "127.0.0.1");
  define("USER", "root");
  define("DATABASE", "greenfull");
  define("PASS", "ISeeYouToo2945");

  $Link = mysqli_connect(SERVER, USER, PASS, DATABASE) or die (mysqli_connect_error());

  class User {

    // Fields
    private $Username;
    private $Password;
    private $Email, $Fullname;

    // Constructor
    function __construct($Link, $Username, $Password)
    {
      if($Username == null || $Password == null) {
        echo "Error!! Zip-zap, try again later (P.S. Programmer forgot to pass all of the arguments of a function. )";
        return;
      }

      this->Username = $Username;
      this->Password = $Password;
      $EmailQuery = "SELECT `email` FROM `users` WHERE username = '$Username' AND password = '$Password'";
      this->Email = mysqli_query($Link, $EmailQuery) or die ("Some error happened, idk which and I am too tired to figure it out, so just try again later :| : . ");
      $FullnameQuery = "SELECT `fullname` FROM `users` WHERE username = '$Username' AND password = '$Password'";
      this->Fullname = mysqli_query($Link, $FullnameQuery) or die ("Some error happened, idk which and I am too tired to figure it out, so just try again later :| : . ");

      logIn($Username, $Password, $Link);
    }

    function __construct($Link, $Fullname, $Email, $Username, $Password)
    {
      if($Fullname == null || $Email == null || $Username == null || $Password == null) {
        echo "Error!! Zip-zap, try again later (P.S. Programmer forgot to pass all of the arguments of a function. )";
        return;
      }

      this->Fullname = $Fullname;
      this->Email = $Email;
      this->Username = $Username;
      this->Password = $Password;

      register($Fullname, $Email, $Username, $Password);
    }

    // Getters
    public function getUsername() { return $Username; }
    public function getPassword() { return $Password; }
    public function getFullname() { return $Fullname; }
    public function getEmail() { return $Email; }

    // Setters
    public function setUsername($New) { $Username = $New; }
    public function setPassword($New) { $Password = $New; }
    public function setFullname($New) { $Fullname = $New; }
    public function setEmail($New) { $Email = $New; }

    // Other Methods

    public function logIn($Username, $Password, $Link)
    {

      $Query = "SELECT * FROM `users` WHERE username = '$Username' AND password = '$Password'";
      $Result = mysqli_query($Link, $Query) or die ("There was a fatal error while trying to log in, we are super sorry meeee :( . Just try again later.. ");
      $Number = $Result->num_rows;
      if($Number > 0)
      {
        $Row = mysqli_fetch_row($Result);

        $DBUserID = $Row[0];
        $DBFullname  =  $Row[1];
        $DBEmail = $Row[2];
        $DBUsername = $Row[3];
        $DBPassword = $Row[4];

        $_SESSION['userid'] = $DBUserID;
        $_SESSION['fullname'] = $DBFullname;
        $_SESSION['email'] = $DBEmail;
        $_SESSION['username'] = $DBUsername;
        $_SESSION['password'] = $DBPassword;

        header('Location: profile.php');

      }
      else
      {
        // Check if that username exists
        $UsernameQuery = "SELECT * FROM `users` WHERE username = '$Username'";
        $UsernameQueryResult = mysqli_query($UsernameQuery, $Link) or die ("Fatal error just pop up, like a new born lamb! Ahaaa.... Plase try again later. ");
        $UsernameNumRows = $UsernameQueryResult->num_rows;
        if($UsernameNumRows > 0) echo "Nope mate, that is a wrong password for that username. Go back <a href = '/GreenFull/Code/HTML/login.html'>here</a>";
        else {
          // Check if that password exists
          $PasswordQuery = "SELECT * FROM `users` WHERE password = '$Password' ";
          $PasswordQueryResult = mysqli_query($PasswordQuery, $Link) or die ("Fatal error just pop up, like a new born lamb! Ahaaa.... Plase try again later. ");
          $PassQueryNumRows = $PasswordQueryResult->num_rows;
          if($PassQueryNumRows > 0) echo "Nah pal, that is a wrong password for that username, since that username is not in our database.. So yeah be a lamb and try again later.
          '<br>' Go back <a href = '/GreenFull/Code/HTML/login.html'>here</a> ";
          // Just write a msg that both username and password does not exist in the database
          else echo "Are you drunk? Cuz neither that username nor that password exists in our database.
          '<br>' Go back <a href = '/GreenFull/Code/HTML/login.html'>here</a> ";
        }
      }

    }

    public function regusterNewAccount($Fullname, $Email, $Username, $Password) {
      // ToDo:: Continue in the morning..
    }

  }

?>
