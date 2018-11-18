<?php
	// |====================================================|
    // |                     badge.php                      |
    // |            Copyright (c) 2018 Belikhun.            |
    // |      This file is licensed under MIT license.      |
    // |====================================================|

    require_once $_SERVER["DOCUMENT_ROOT"]."/lib/belibrary.php";

    function createbadge(array $data = Array(
        color => "green",
        subject => "sample",
        status => "text",
    )) {
        $clist = Array(
            "green" => "#97CA00",
            "yellow" => "#dfb317",
            "orange" => "#fe7d37",
            "red" => "#e05d44",
            "blue" => "#007ec6",
            "pink" => "ff69b4",
            "brightgreen" => "#4c1",
            "yellowgreen" => "#a4a61d",
            "lightgrey" => "#9f9f9f"
        );
        $boxpadding = 18;
        $ccode = isset($clist[$data["color"]]) ? $clist[$data["color"]] : "#000";
        $sulen = mb_strlen($data["subject"]) * 6.5;
        $stlen = mb_strlen($data["status"]) * 6.5;
        $box1 = $sulen + $boxpadding;
        $box2 = $stlen + $boxpadding;
        $suanchor = ($box1/2)*10;
        $stanchor = ($box1 + $box2/2)*10;
        header("Content-Type: image/svg+xml;charset=utf-8");

        ?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="<?php print $box1 + $box2; ?>" height="20">
                <g shape-rendering="crispEdges">
                    <path fill="#555" d="M0 0h<?php print $box1; ?>v20H0z"/>
                    <path fill="<?php print $ccode; ?>" d="M<?php print $box1; ?> 0h<?php print $box2; ?>v20H<?php print $box1; ?>z"/>
                </g>
                <g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="110">
                    <text x="<?php print $suanchor; ?>" y="140" transform="scale(.1)">
                        <?php print $data["subject"]; ?>
                    </text>
                    <text x="<?php print $stanchor; ?>" y="140" transform="scale(.1)">
                        <?php print $data["status"]; ?>
                    </text>
                </g>
            </svg>
        <?php
    }

    $subject = getquery("su", "badge generator by");
    $status = getquery("st", "Belikhun");
    $color = getquery("c", "brightgreen");
    createbadge(Array(
        "color" => $color,
        "subject" => $subject,
        "status" => $status
    ));