<div class='mainemp'>
    <div class = "buttontitle">
        <a href = "https://al-rhal.com/en/employeeadminrequests" class = 'button'>Back to all requests</a>   
    </div>
</div>
<div>
    <form action = "" method="post">
        <h3 style="text-align:center">General information</h3>
            <div class="inputcol">
                <input type='text' name='login-name' placeholder = "Login Name">
            </div>
            <div class="inputcol">
                <input type='text' name='email' placeholder = "Email">
            </div>
            <div class="inputcol">
                <input type='text' name='password' placeholder = "Password">
            </div>
        
        <h3 style="text-align:center;">Personal information</h3>
        <div class="inputcol">
            <input type='text' name='en-name' placeholder = "English Name">
        </div>
        <div class="inputcol">
            <input type='text' name='ar-name' placeholder = "Arabic Name">
        </div>
        <div class="inputcol">
            <input type='text' name='phone' placeholder = "Phone">
        </div>
        <div class="inputcol">
            <input type='text' name='whatsapp' placeholder = "Whatsapp">
        </div>
        <input type='hidden' name="action" value='addemp'>
        <button type='submit' style="width:30%;display:inline;margin-left:35%;">Add</button>
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