<?php
class indexController extends PlatformController {
    public function IndexAction()
    {
        $article = Factory::M('ArticleModel');
        $recommendArt = $article->getRecommendArt(5);
        $this->assign('recommendArt', $recommendArt);

        $newArt = $article->getNewArt(8);
        $this->assign('newArt', $newArt);
        $rmdArtByHits = $article -> getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        $this->display('index.html');
    }
}