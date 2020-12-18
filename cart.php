<?php require 'header.php'; ?>
<h1 class="text-center">Cart</h1>
<?php $ca = $_SESSION['cart']; ?>
<table id="tbl">
<thead>
<tr>
<th>Name</th>
<th>plan</th>
<th>Price</th>
<th>Billing</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($ca as $key=>$val){ ?>
<tr>
<td><?php echo $val['pn']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['price']; ?></td>
<td><?php echo $val['plan']; ?></td>
<td><a onClick="javascript: return confirm('Please confirm deletion');" href="addcart.php?action=delc&&id=<?php echo $key; ?>" class="btn btn-danger">Delete</a></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php require 'footer.php'; ?>