<?php require_once 'function.php'; ?>
<html>
    <head>
        <title>YAPAY ZEKA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
            
        </head>
    <body>

        <div class="container mt-5" align="center">
            <div class="row col-md-6">
                <div class="card mb-3">
                    <div class="card-header">YAPAY ZEKA MAKALE ÜRETİM</div>
                    <div class="body">

                        <?php 
                            if(isset($_POST['submit'])){


                                $baslik  = strip_tags(trim($_POST['baslik']));
                                $uzunluk = strip_tags(trim($_POST['uzunluk']));
                                $olusanmetin = '';

                                if(!$baslik || !$uzunluk){
                                    echo '<div class="alert alert-danger">Boş alan bırakmayınız</div>';
                                }else{

                                    $yapayzeka   =  getOpenAiText($baslik,(int)$uzunluk);
                                    $olusanmetin =  $yapayzeka->choices[0]->message->content;

                                }

                            }
                        ?>

                        <form action="" method="POST">
                            <div class="form-group mb-2">
                                <label><b>Makale başlığı için prompt giriniz</b></label>
                                <input type="text" name="baslik" class="form-control" placeholder="Başlık giriniz" />
                            </div>
                            <div class="form-group mb-2">
                                <label><b>Makale uzunluğu</b></label>
                                <input type="number" name="uzunluk" class="form-control" placeholder="Makale uzunluğu" />
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success">MAKALE ÜRET</button>
                            </div>
                        </form> 

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">OLUŞAN MAKALE BURADA YER ALACAK</div>
                    <div class="body">
                    <textarea class="form-control" rows="20" namme="metin"><?php echo @$olusanmetin;?></textarea>
                    </div>
                </div>

            </div>
        </div>

    </body>
</ht>