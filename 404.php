<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <style>
        body {
            background: #081421;
            color: #d3d7de;
            font-family: "Courier new";
            font-size: 18px;
            line-height: 1.5em;
            cursor: default;
        }

        .code-area {
            position: absolute;
           width: 320px;
            min-width: 320px;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .code-area > span {
            display: block;
        }

        @media screen and (max-width: 320px) {
            .code-area {
                font-size: 5vw;
                min-width: auto;
                width: 95%;
                margin: auto;
                padding: 5px;
                padding-left: 10px;
                line-height: 6.5vw;
            }
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="code-area">
        <span style="color: #777;font-style:italic;">
            // 404 page not found.
        </span>
        <span>
            <span style="color:#d65562;">
            if
            </span>
            (<span style="color:#4ca8ef;">!</span><span style="font-style: italic;color:#bdbdbd;">found</span>)
            {
        </span>
        <span>
            <span style="padding-left: 15px;color:#2796ec">
            <i style="width: 10px;display:inline-block"></i>throw
            </span>
            <span>
            (<span style="color: #a6a61f">"Error"</span>);
            </span>
            <span style="display:block">}</span>
        </span>
            <br>
            <span><span style="color: #29B6F6">echo<a href="<?php echo home_url(); ?>"><span style="color: #f57f17"> "HOMEPAGE"</span></a></span>;<span>
    </div>
</body>
</html>