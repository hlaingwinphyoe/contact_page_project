<?php

function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}
function redirect($l){
    echo "<script>location.href = '$l'</script>";
}

function textFilter($text){
    $text = strip_tags($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripslashes($text);

    return $text;
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}

function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function clearError(){
    $_SESSION['error']= [];
}

function runQuery($sql){
    $con = con();
    if(mysqli_query($con,$sql)){
        return true;
    }else{
        die("Query Fail : ".mysqli_error($con));
    }
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

// register

function contactAdd(){

    $errorStatus = 0;
    $name = "";
    $phone = "";

    if(empty($_POST['name'])){
        setError("name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 20){
                setError("name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if (empty($_POST['phone'])){
        setError("phone","Phone Number is required!");
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9 ]*$/",$_POST['phone'])) {
            setError('phone',"Only numbers allowed!");
            $errorStatus=1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    $supportFileType = ['image/jpeg','image/png'];
    $name = textFilter($_POST['name']);
    $phone = textFilter($_POST['phone']);

    if($_FILES['upload']['name']){
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        if(in_array($_FILES['upload']['type'],$supportFileType)){
            $saveFolder = "store/";
            $newName = $saveFolder.uniqid()."_".$fileName;
            move_uploaded_file($tempFile,$newName);
            $sql = "INSERT INTO contacts (name,phone,photo) VALUES ('$name','$phone','$newName')";
            if (runQuery($sql)){
                redirect("index.php");
            }
        }else{
            setError("upload","File Incorrect");
            $errorStatus=1;
        }

    }else{
        setError("upload","File is required");
        $errorStatus=1;
    }
}

function contact($id){
    $sql = "SELECT * FROM contacts WHERE id=$id";
    return fetch($sql);
}

function contacts(){
    $sql = "SELECT * FROM contacts ORDER BY name ASC";
    return fetchAll($sql);
}

function contactDelete($id){
    $sql = "DELETE FROM contacts WHERE id=$id";
    return runQuery($sql);
}

function contactUpdate(){
    $errorStatus = 0;
    $name = "";
    $phone = "";

    if(empty($_POST['name'])){
        setError("name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 20){
                setError("name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if (empty($_POST['phone'])){
        setError("phone","Phone Number is required!");
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9 ]*$/",$_POST['phone'])) {
            setError('phone',"Only numbers allowed!");
            $errorStatus=1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    $supportFileType = ['image/jpeg','image/png'];
    $id = $_POST['id'];
    $name = textFilter($_POST['name']);
    $phone = textFilter($_POST['phone']);

    if($_FILES['upload']['name']){
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        if(in_array($_FILES['upload']['type'],$supportFileType)){
            $saveFolder = "store/";
            $newName = $saveFolder.uniqid()."_".$fileName;
            move_uploaded_file($tempFile,$newName);
            $sql = "UPDATE contacts SET name='$name',phone='$phone',photo='$newName' WHERE id=$id";
            if (runQuery($sql)){
                redirect("index.php");
            }
        }else{
            setError("upload","File Incorrect");
            $errorStatus=1;
        }

    }else{
        setError("upload","File is required");
        $errorStatus=1;
    }
}