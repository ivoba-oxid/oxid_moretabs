<?php
class oxarticle_ext extends oxarticle_ext_parent {

  private $maxNumTabs = 5;

  public function getPossibeTabNums() {
    $arr = array();
    for($i = 1; $i <= $this->maxNumTabs; $i++) {
        $arr[] = $i;
    }
    return $arr;
  }

    /**
    * Get the number of the last tab that was edited by the user, i.e. has a non-empty title or description
    *
    * @return int
    */
    public function getHighestEditedTabNum() {
        $max = 1;
        for($i = 1; $i <= $this->maxNumTabs; $i++) {
            $tab = $this->getTab($i);
            if(!empty($tab["title"]->value) || !empty($tab["desc"]->value)) $max = $i;
        }
        return $max;
    }

    /**
    * Get article long description
    *
    * @return object $oField field object
    */
    public function getTab($num) {
        // initializing
        $this->_oTabTitle = new oxField();
        $this->_oTabDesc = new oxField();
        $this->_oTabPos = new oxField();

        // choosing which to get..
        $sOxid = $this->getId();
        $sViewName = getViewName('mstabs', $this->getLanguage());

        $oDb = oxDb::getDb();
        $sDbValue_title = $oDb->getOne("select tab{$num}_title from {$sViewName} where oxid = " . $oDb->quote( $sOxid ));
        $sDbValue_desc = $oDb->getOne("select tab{$num}_desc from {$sViewName} where oxid = " . $oDb->quote( $sOxid ));
        $sDbValue_pos = $oDb->getOne("select tab{$num}_pos from {$sViewName} where oxid = " . $oDb->quote( $sOxid ));

        if ($sDbValue_title != false OR $sDbValue_desc != false) {
            $this->_oTabTitle->setValue( $sDbValue_title, oxField::T_RAW );
            $this->_oTabDesc->setValue( $sDbValue_desc, oxField::T_RAW );
            $this->_oTabPos->setValue( $sDbValue_pos, oxField::T_RAW );
        }
        elseif ($this->oxarticles__oxparentid->value) {
            if (!$this->isAdmin() || $this->_blLoadParentData) {
                $this->_oTabTitle->setValue($this->getParentArticle()->getTabTitle($num)->getRawValue(), oxField::T_RAW);
                $this->_oTabDesc->setValue($this->getParentArticle()->getTabDesc($num)->getRawValue(), oxField::T_RAW);
                $this->_oTabPos->setValue($this->getParentArticle()->getTabPos($num)->getRawValue(), oxField::T_RAW);
            }
    }

    return array(
      "title" => $this->_oTabTitle,
      "desc" => $this->_oTabDesc,
      "pos" => $this->_oTabPos
      );
    }

    public function getTabTitle($sNum) {
        $obj = $this->getTab($sNum);
        return $obj["title"];
    }

    public function getTabDesc($sNum, $smarty_parsed = false) {
        $obj = $this->getTab($sNum);
        if($smarty_parsed) return oxRegistry::get("oxUtilsView")->parseThroughSmarty($obj["desc"], $this->getId().$this->getLanguage(), null, true);
        else return $obj["desc"];
    }

    public function getTabPos($sNum) {
        $obj = $this->getTab($sNum);
        return $obj["pos"];
    }

    public function saveTab($sTitles, $sDescs, $sPoss) {
        $myConfig = $this->getConfig();
        $sShopId = $myConfig->getShopID();

        $oArtExt = oxNew('oxI18n');
        $oArtExt->init('mstabs');
        $oArtExt->setLanguage((int) $this->getLanguage());
        if (!$oArtExt->load($this->getId())) {
            $oArtExt->setId($this->getId());
        }

        for($i = 1; $i <= count($sTitles); $i++) {
            $titleField = "mstabs__tab".$i."_title";
            $descField = "mstabs__tab".$i."_desc";
            $posField = "mstabs__tab".$i."_pos";
            $oArtExt->$titleField = new oxField($sTitles[$i], oxField::T_RAW);
            $oArtExt->$descField = new oxField($sDescs[$i], oxField::T_RAW);
            $oArtExt->$posField = new oxField($sPoss[$i], oxField::T_RAW);
        }
        $oArtExt->save();
    }
}
