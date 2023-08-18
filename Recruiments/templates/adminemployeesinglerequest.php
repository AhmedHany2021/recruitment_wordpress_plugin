<div class='mainemp'>
    <div class = "buttontitle">
        <a href = "https://al-rhal.com/en/employeeadminrequests/" class = 'button'>Back to all requests</a>   
    </div>
    <table>
        <thead>
            <th>
                <h2>Recruiment</h2>
            </th>
            <th>
                <h2>Customer</h2>
            </th>
            <th>
               <h2>Request Data</h2> 
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
                    
                    <h3>Name: <?php echo $user->user_nicename ?></h3>
                    <h3>Email: <a href="mailto:<?php echo $user->user_email?>"><?php echo $user->user_email?></a></h3>
                    <h3 > phone :  <a href="tel:<?php echo $user->account_phone ?>"><?php echo $user->account_phone?></a></h3>

                    
                </div>    
            </td>
            <td>
                <h3>employee Name:  <?php echo $employee['english_name'][0]; ?></h3>
                <?php $data = get_post_meta($request->ID);?>
                <h3>order status: <?php echo $statuses[$data['status'][0]]; ?></h3>
            </td>
        </tr>
    </table>
</div>
<div>
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