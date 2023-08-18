<table class="table table-bordered" style="direction:rtl;">
    <thead>
        <tr>
        <th>العميل</th>
        <th>العامل</th>
        <th>الحاله</th>
        <th>تعديل</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requests as $request): ?>
            <?php $data = get_post_meta($request->ID);?>
            <?php if(get_current_user_id() == $data['support-id'][0]): ?>
            <tr>
                <?php 
                    $user = get_user_by('id',$data['customer-id'][0]);
                    $recruiment = get_post_meta($data['recruiment-id'][0]);
                ?>
                <td><?php echo($user->user_login); ?></td>
                <td><?php echo($recruiment['name'][0]); ?></td>
                <td><?php echo $statuses[$data['status'][0]]; ?></td>
                <td><a href = "?request_id=<?php echo $request->ID ?>">تعديل</a></td>
            </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </tbody>
    
</table>