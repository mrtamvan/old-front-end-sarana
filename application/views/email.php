<html>
<body>
<p>
Hi, <?= $nama ?>
<br>
Please click on below link for verify your account <br />
<a target="_BLANK" href="<?= base_url() .
  "verify/" .
  $id .
  "/" .
  $code ?>">VERIFY</a>
<br />
<br />
If you didnt ask to verify this address, you can ignore this email.

<br />
<br />
Thanks,
<br />
Sarana Crowdfunding team</p>
</body>
</html>