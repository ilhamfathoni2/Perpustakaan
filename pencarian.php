<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		*{
			font-family: Segoe UI, Helvetica Neue, Arial ; 
		}
		input{
			margin-left:  25px;
    		border: #333652 solid 1px;
    		background-color: #E9EAEC;
    		padding: 10px 10px 10px 10px;
    		font-size: 16px;
    		border-radius: 3px;
		}
		button{
    		border: none;
    		border-radius: 5px;
    		background-color: white;
    		cursor: pointer;
    		padding: 10px;
    		color: #333652;
    		text-transform: uppercase;
    		font-weight: bold;
    		font-size: 16px;
		}
	</style>
</head>
<body>

<form action="" method="get">
    <input type="search" name="kata_kunci" placeholder="Cari <?php echo $buff?>" <?php if(isset($_GET['kata_kunci'])) echo "value ='". $_GET['kata_kunci']."'";?>>
    <button type="submit" name="cari">Cari</button>
</form>

</body>
</html>
