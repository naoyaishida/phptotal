<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    body{
        text-align: center;
        margin: 0 auto;
        width:100%;
    }
    
    table{
        margin: 0 auto;

    }
    table, td, th { border: 2px solid black }

    textarea{
        height:200px;
        width:300px;
    }

    </style>

    <?php
    
    $a = $_GET['text1'];
    $b = $_GET['text2'];
    $sum = $a + $b;

    $c = $_GET["text3"];
    $d = $_GET["text4"];
    $conect = $c.$d;

    $e = $_POST["text5"];
    $f = $_POST["text6"];
    if(isset($_POST["submit"])){
        if( $e === "mark" && $f === "123"){
            header('location:https://www.amazon.in/');
        }else{
            echo "incorect";
        }
    }

    $g = $_POST['file1'];



    ?>

</head>

<body>
    <h1>Get caliculator</h1>
    <form method="get">
        <?php echo $sum;?>
    <table class="table">
        <tr>
            <td><input type="text" name="text1"></td>
            <td><input type="text" name="text2"></td>
        </tr>
        <tr>
           <td colspan="2"><input type="submit" value="submit"></td>
        </tr>

    </table>
    </form>

    <h1>INTO TEXT</h1>

     <form method="get">
    <table class="table">
        <tr>
            <td><input type="text" name="text3"></td>
            <td><input type="text" name="text4"></td>
        </tr>
        <tr>
           <td colspan="2"> <textarea><?php echo $conect;?></textarea></td>
        </tr>

    </table>
    <input type="submit" value="submit">
    </form>

    <h1>Login</h1>

    <form method="POST">
    <table class="table">
        <tr>
            <td><input type="text" name="text5" placeholder="ID"></td>
            <td><input type="text" name="text6" placeholder="PW"></td>
        </tr>
        <tr>
           <td><button type="submit" name="submit">submit</button></td>
        </tr>

    </table>
    </form>
    <br><br>

    <h1>UPLOAD</h1>
   
    <form method="POST" action="get2.php" enctype="multipart/form-data">
    <input type="file" name="file1">
    <button type="submit" name="submit">upload</button>
    
    </form>

    <?php

        if(isset($_POST['submit2'])){

        
        
        $name1 = $_POST["name1"];
        $name2 = $_POST["name2"];
        $name3 = $name1.$name2;
        $name4 = $_POST["name3"];
        $name5 =touch("$name3");

    
        if(file_exists($name3)){
        $fo = fopen($name3,"w") ;
        flock($fo,LOCK_EX)or die("errore");
        fwrite($fo,$name4);
        flock($fo,LOCK_UN) or die("errort");
        fclose($fo);  
        }

        if(file_exists($name3)){
        $fo2 = fopen($name3,"r");
        $output = fread($fo2,filesize($name3));
        fclose($fo2);
    }
    }

    ?>

    <form method="POST">
        <input type="text" name="name1" placeholder="name">
        <select name="name2">
            <option>.txt</option>
            <option>.pdf</option>
            <option>.doc</option>
        </select>
        <input type="text" name="name3" placeholder="text">
        <button type="submit" name="submit2">submit</button>
        <textarea><?php echo $output; ?></textarea>
    </form>
    
</body>
</html>