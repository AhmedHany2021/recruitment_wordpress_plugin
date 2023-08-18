<div class='mainemp' style="direction:rtl;">
    <div class = "buttontitle">
        <a href = "https://al-rhal.com/en/employeecontrol" class = 'button'>العودة لقائمة الطلبات</a>   
    </div>
    <table>
        <thead>
            <th>
                <h2>العامل</h2>
            </th>
            <th>
                <h2>العميل</h2>
            </th>
        </thead>
        <tr>
            <td>
                <div class = 'col6'>
                    
                    <?php echo $recruiment_image ?>
                </div>                
            </td>
            <td>
                <div class='col6'>
                    
                    <h3 style="direction:rtl;">الاسم :  <?php echo $user->user_nicename ?></h3>
                    <h3 style="direction:rtl;">الأيميل :  <a href="mailto:<?php echo $user->user_email?>"><?php echo $user->user_email?></a></h3>
                    <h3 style="direction:rtl;"> رقم الهاتف:  <a href="tel:<?php echo $user->account_phone ?>"><?php echo $user->account_phone?></a></h3>
                    
                </div>    
            </td>
        </tr>
    </table>
</div>
<div>
    <form action = "" method="post" style="direction:rtl;">
        <lable for="status">تغيير الحاله</lable>
        <select name="status" id="status" style="width:30%;display:inline;">
            <?php foreach($statuses as $key => $val): ?>
                <option value="<?php echo $key ?>" <?php if($key == $data['status'][0]){echo "selected";} ?>><?php echo $val ?></option>
            <?php endforeach; ?>
        </select>
        <!--<input type='hidden' name='status' value="one">-->
        <input type='hidden' name="request_id" value='<?php echo $_GET['request_id']; ?>'>
        <button type='submit' style="width:30%;display:inline;">تغيير</button>
    </form>
    
    
</div>
<div>
    <form action = "" method="post" style="direction:rtl;">
        <textarea name='comment' id='comment' placeholder = "Add comment for cutomer" style="width:30%;display:inline;" rows="4" cols="50">
            <?php if(isset($data['comment']) && isset($data['comment'][0]) && $data['comment'][0] != ''){echo $data['comment'][0];} ?>
        </textarea>
        <!--<input type='hidden' name='status' value="one">-->
        <input type='hidden' name="request_id" value='<?php echo $_GET['request_id']; ?>'>
        <button type='submit' style="width:30%;display:inline;">اضافة تعليق</button>
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
</style>