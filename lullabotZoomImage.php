<?php
require 'vendor/autoload.php';
/**
 * LullabotZoomImage Class.
 *
 * Used to generate Lullabot Zoom images depends of contributor name and role.
 */
class lullabotZoomImage {

    /**
     * Get a SimpleImage object.
     *
     * @return \claviska\SimpleImage
     */
    public function getClaviskaImage() {
        $image = new \claviska\SimpleImage();
        return $image;
    }

    /**
     * Generate images depending on the names and roles of the Lullabot collaborators.
     *
     * @throws Exception
     * @return ClaviskaSimpleImage if params are correct else a error message.
     */
    public function generateDynamicBackgroundImages() {
        if(isset($_GET['name']) && isset($_GET['role'])) {
            $this->getClaviskaImage()
                ->fromFile('assets/img/blank.png')
                ->autoOrient()                           ///< adjust orientation
                //->resize(630, 379)
                ->text("NAME: " . strtoupper($_GET['name']), [
                        'fontFile' => 'assets/font/mullishregular.ttf',
                        'size' => 298 ,
                        'color' => '#000000',
                        'anchor' => 'top start',
                        'xOffset' => 40,
                        'yOffset' => 0,
                    ]
                )
                ->text("ROLE: " . strtoupper($_GET['role']), [
                        'fontFile' => 'assets/font/mullishregular.ttf',
                        'size' => 198 ,
                        'color' => '#000000',
                        'anchor' => 'top start',
                        'xOffset' => 40,
                        'yOffset' => 340,
                    ]
                )
                ->overlay('assets/img/lullabot-social-og-image.png', 'end center',1,0,725) ///< dni number
                 ->toScreen();
        } else {
            echo "<h1>URL NOT FOUND</h1><h2>Created by Joseph David</h2>";
        }

    }
}

$lullabotZoomImage = new lullabotZoomImage();
$lullabotZoomImage->generateDynamicBackgroundImages();
echo '<link rel="shortcut icon" href="//cdn.sstatic.net/stackoverflow/img/favicon.ico?v=038622610830">
';