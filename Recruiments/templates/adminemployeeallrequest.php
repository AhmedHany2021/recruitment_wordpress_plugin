<h3 style = 'text-align:center'>Requests</h3>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>Customer</th>
        <th>Recruiment</th>
        <th>employee</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requests as $request): ?>
            <tr>
                <?php $data = get_post_meta($request->ID);?>
                <?php 
                    $user = get_user_by('id',$data['customer-id'][0]);
                    $recruiment = get_post_meta($data['recruiment-id'][0]);
                    $employee = get_user_by('id',$data['support-id'][0]);
                ?>
                <td><?php echo($user->user_login); ?></td>
                <td><?php echo($recruiment['name'][0]); ?></td>
                <td><?php echo($employee->user_login); ?></td>
                <td><?php echo $statuses[$data['status'][0]]; ?></td>
                <td><a href = "?request_id=<?php echo $request->ID ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<h3 style = 'text-align:center'>Employees</h3>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>Emp. Name</th>
        <th>Phone</th>
        <th>Whatsapp</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <?php $user_meta = get_user_meta($user->ID);?>
                <td><?php echo($user_meta["english_name"][0]); ?></td>
                <td><?php echo($user_meta["number"][0]); ?></td>
                <td><?php echo($user_meta["whatsapp"][0]); ?></td>
                <td><a href = "?user_id=<?php echo $user->ID ?>&action=edit"> Edit </a><a href = "?user_id=<?php echo $user->ID ?>&action=delete" style = "color:red"> Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<div class = "buttontitle">
    <a href = "https://al-rhal.com/en/employeeadminrequests/?action=addnewuser" class = 'button'>Add User</a>   
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