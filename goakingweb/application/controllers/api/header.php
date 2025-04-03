<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?=website_name ?></title>
      <link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- css-link -->
      <link rel="stylesheet" href="<?=base_url() ?>website/style.css" />
      <!-- icon-link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
   </head>
   <body>
      <div class="header" style="display: flex;justify-content: space-between;padding: 0 20px;align-items: center;background-color: #000;">
         <h1 class="new-logo py-4 m-0 text-uppercase">
            <a href="<?=base_url() ?>"><b><span><?=website_name ?></span></b></a>
         </h1>
         <a href="goa-king.apk" class="btn btn-success sky-btn sky-two-btn">Download App</a>
      </div>