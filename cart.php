<?php require 'header.php'; ?>
<h1 class="text-center">Cart</h1>
<?php $ca = $_SESSION['cart']; ?>
<table id="tbl">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>plan</th>
<th>SKU</th>
<th>Price</th>
<th>Billing</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($ca as $key=>$val){ ?>
<tr>
<td><?php echo $val['id'] ?></td>
<td><?php echo $val['pn']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['sku'] ?></td>
<td>RS <?php echo $val['price']; ?></td>
<td><?php echo $val['plan']; ?></td>
<td><a onClick="javascript: return confirm('Please confirm deletion');" href="addcart.php?action=delc&&id=<?php echo $key; ?>" class="btn btn-danger">Delete</a></td>
</tr>
<?php } ?>
</tbody>
</table>
<div class="text-center">
<a href="cheko.php" class="btn btn-success">Checkout</a>
</div>
<?php require 'footer.php'; ?>