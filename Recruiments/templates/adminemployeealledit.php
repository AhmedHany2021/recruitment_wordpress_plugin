<div class='mainemp'>
    <div class = "buttontitle">
        <a href = "https://al-rhal.com/en/employeeadminrequests" class = 'button'>Back to all requests</a>   
    </div>
</div>
<div>
    <form action = "" method="post">
        <div class="inputcol">
            <lable for="en-name">english name</lable>
            <input type='text' name='en-name' value="<?php echo $user["english_name"][0] ?>">
        </div>
        <div class="inputcol">
            <lable for="en-name">Arabic name</lable>
            <input type='text' name='ar-name' value="<?php echo $user["arabic_name"][0] ?>">
        </div>
        <div class="inputcol">
            <lable for="en-name">Phone</lable>
            <input type='text' name='phone' value="<?php echo $user["number"][0] ?>">
        </div>
        <div class="inputcol">
            <lable for="en-name">whatsapp</lable>
            <input type='text' name='whatsapp' value="<?php echo $user["whatsapp"][0] ?>">
        </div>
        <input type='hidden' name="user_id" value='<?php echo $_GET['user_id']; ?>'>
        <button type='submit' style="width:30%;display:inline;margin-left:35%;">change</button>
    </form>
    
    
</div>


<div>
    <form action = "" method="post">
        <div class="inputcol">
            <lable for="new_pass">password</lable>
            <input type='text' name='new_pass' placeholder="enter new password">
        </div>
        <input type='hidden' name="user_id" value='<?php echo $_GET['user_id']; ?>'>
        <button type='submit' style="width:30%;display:inline;margin-left:35%;">change</button>
    </form>
    
    
</div>

<style>
    
    .mainemp
    {
        min-width:100%;
    }
    
    .col6
    {
        min-width:50%;
        margin-top: 20px;
    }
    .button {
        font: bold 18px Arial;
        text-decoration: none;
        background-color: #000;
        color: #fff;
        padding: 7px 7px 7px 7px;
        border-top: 1px solid #CCCCCC;
        border-right: 1px solid #333333;
        border-bottom: 1px solid #333333;
        border-left: 1px solid #CCCCCC;
    }
    
    .button:hover{
        color:#ffffff;
    }
    .buttontitle
    {
        margin-top: 20px;
        margin-bottom: 20px;
        width:100%;
        text-align: center;
    }
    .inputcol
    {
        width:  49% !important;
        display:inline-block !important;
        margin-bottom: 20px;
    }
</style>