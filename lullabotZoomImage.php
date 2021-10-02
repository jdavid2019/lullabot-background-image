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
        if(isset($_GET['name']) && isset($_GET['role']) && isset($_GET['view'])) {
          if($_GET['view'] == '1' || $_GET['view'] == '2' ) {
            if($_GET['view'] == '1') {
              $this->getClaviskaImage()
                  ->fromFile('assets/img/'. $_GET['view'] . '.png')
                  ->text(ucwords($_GET['name']), [
                          'fontFile' => 'assets/font/freight_big_medium.otf',
                          'size' => 72,
                          'color' => '#000000',
                          'anchor' => 'end left',
                          'xOffset' => -565,
                          'yOffset' => 350,
                          'calculateOffsetFromEdge' => true,
                          'baselineAlign' => true,
                      ]
                  )
                  ->text(ucwords($_GET['role']), [
                          'fontFile' => 'assets/font/freight_big_medium.otf',
                          'size' => 54,
                          'color' => '#000000',
                          'anchor' => 'end left',
                          'xOffset' => -600,
                          'yOffset' => 450,
                          'calculateOffsetFromEdge' => true,
                          'baselineAlign' => true,
                      ]
                  )
                  ->toScreen();
            }elseif ($_GET['view'] == '2') {
              $this->getClaviskaImage()
                  ->fromFile('assets/img/'. $_GET['view'] . '.png')
                  ->textBox($_GET['name'], array(
                      'fontFile' => 'assets/font/freight_big_medium.otf',
                      'size' => 70,
                      'color' => '#FFFFFF',
                      'anchor' => 'end left',
                      'xOffset' => 394,
                      'yOffset' => 350,
                      'leading' => 30,
                      'justify' => 'justify',
                      'width' => 1000,
                  ))
                  ->textBox(strtoupper($_GET['role']), array(
                      'fontFile' => 'assets/font/freight_big_medium.otf',
                      'size' => 36,
                      'color' => '#FFFFFF',
                      'anchor' => 'end left',
                      'xOffset' => 394,
                      'yOffset' => 425,
                      'leading' => 30,
                      'justify' => 'justify',
                      'width' => 1000,
                  ))
                  ->toScreen();
            }

          } else {
            echo "<h1>VIEW TYPE NOT FOUND</h1><h2>Created by Joseph David</h2>";
          }

        } else {
            echo "<h1>URL NOT FOUND</h1><h2>Created by Joseph David</h2>";
        }

    }
}

$lullabotZoomImage = new lullabotZoomImage();
$lullabotZoomImage->generateDynamicBackgroundImages();
echo '<link rel="shortcut icon" href="//cdn.sstatic.net/stackoverflow/img/favicon.ico?v=038622610830">
';