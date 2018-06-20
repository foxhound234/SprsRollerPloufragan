<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="<?php echo css_url('Table')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo form_open('Visiteur/ModifierLePanier'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0" class='table table-hover'>

<tr>
        <th>QTY</th>
        <th>Description du produit</th>
        <th> Supprimer</th>
        <th style="text-align:right">Prix du Produit</th>
        <th style="text-align:right">Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr> 
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <?php echo form_close(); ?>
                 <?php echo '<td>'.anchor('Visiteur\SupprimerProduitduPanier/'.$items['rowid'],'Supprimer');?>
                <?php echo form_close();?>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">€<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>
<p><?php echo form_submit('BtnModifier', 'Mettre a Jour Votre Panier',array('class'=>"btn btn-primary"));'</p>'; 
echo form_close();?>
<?php
 echo form_open('Supporter/PasserCommande');
 if ($this->session->profil=='S'or $this->session->profil=='J')
{
  echo form_submit('btnAchat', 'passer commande',array('class'=>'btn btn-primary')); 
}
 echo form_close();
 ?>
</body>
</html>