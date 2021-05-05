<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/credit.css">
    <title>SPC - Cinema</title>
</head>

<body>
<div class="container">
    <div class="box order_box">
        <div class="head">Details de la commande</div>
        <div class="body">
            <ul class="order_list">
                <li>
                    <div class="prod_info">
                        <div class="name">Plein Tarif: x1</div>
                        <div class="price">$110</div>
                    </div>
                </li>
                <li>
                    <div class="prod_info">
                        <div class="name">Tarif Etudiant: x1</div>
                        <div class="price">$110</div>
                    </div>
                </li>
                <li>
                    <div class="prod_info">
                        <div class="name">Moins 10 ans: x1</div>
                        <div class="price">$110</div>
                    </div>
                </li>
                <li>
                    <div class="prod_info">
                        <div class="name">Tarif Navigo: x1</div>
                        <div class="price">$110</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="foot">
            <dl class="total_price">
                <dt>Total</dt>
                <dd>$550</dd>
            </dl>
        </div>
    </div>
    <div class="box payment_box">
        <div class="head">Informations de paiement</div>
        <div class="body">
            <div class="card">
                <div class="card_img">
                    <i class="fab fa-cc-visa"></i>
                    <div class="card_info">
                        <dl class="number">
                            <dt>numero de carte</dt>
                            <dd>
                                <ul>
                                    <li>0000</li>
                                    <li>0000</li>
                                    <li>0000</li>
                                    <li>0000</li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="expiration">
                            <dt>expiration</dt>
                            <dd>00 / 0000</dd>
                        </dl>
                        <dl class="cvc">
                            <dt>cvc</dt>
                            <dd>000</dd>
                        </dl>
                    </div>
                </div>
                <div class="card_form">
                    <div class="content">
                        <ul class="card_box">
                            <li class="number"><input type="number" maxlength="16" placeholder="1234 5678 1234 5678" /></li>
                            <li class="expiration"><input type="date" placeholder="MM/YYYY" /></li>
                            <li class="cvc"><input type="number" maxlength="3" placeholder="123" /></li>
                        </ul>
                    </div>
                    <div class="footer">
                        <ul class="bar_tool">
                            <li><span class="ui_btn b_lg b_primary">Payer</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">

        </div>
    </div>
</div>
</body>
</html>