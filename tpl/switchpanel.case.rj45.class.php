<?php
	class switchpanel_case_rj45{
		public static function getSvg( $oCase, $iX, $iY, $opt ){
			$sSvg = '';
			if( isset( $oCase[ 'options' ][ 'link' ] ) ){
				$sSvg .= '<a xlink:href="'.$oCase[ 'options' ][ 'link' ].'" target="'.( isset( $oCase[ 'options' ][ 'target' ] ) ? $oCase[ 'options' ][ 'target' ] : $opt[ 'target' ] ).'" style="text-decoration:none">';
			}
			if( isset( $oCase[ 'options' ][ 'text' ] ) ){
				$sLabel = str_replace( "\\", "\\'", isset( $oCase[ 'label' ] ) ? $oCase[ 'label' ] : '' );
				$sTitle = str_replace( "\\", "\\'", isset( $oCase[ 'title' ] ) ? $oCase[ 'title' ] : '' );
				$sText = str_replace( "\\", "\\'", $oCase[ 'options' ][ 'text' ] );
				$sLink = str_replace( "\\", "\\'", isset( $oCase[ 'options' ][ 'link' ] ) ? $oCase[ 'options' ][ 'link' ] : '' );
				if( isset( $oCase[ 'options' ][ 'textlink' ] ) ){
					$sLink = str_replace( "\\", "\\'", $oCase[ 'options' ][ 'textlink' ] );
				}
				$sSvg .= '<g onmousemove="window.oSwitchPanel.showToolTip(evt, \''.$sLabel.'\', \''.$sTitle.'\', \''.$sText.'\', \''.$sLink.'\')" onmouseout="window.oSwitchPanel.hideToolTip()">';
			}
			
			$sColor = $opt[ 'color' ];
			if( isset( $oCase[ 'options' ][ 'color' ] ) ){
				$sColor = $oCase[ 'options' ][ 'color' ];
			}
			
			// for metallic conductors
			$sConductors = '';
			for( $i=0; $i<8; $i++ ){
				$sConductors .= '<rect x="'.( ( $iX + ( $opt[ 'elementWidth' ] / 4 ) ) + ( ( $opt[ 'elementWidth' ] / 15 ) * $i ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 2 ) ).'" width="'.( $opt[ 'elementWidth' ] / 32 ).'" height="'.( $opt[ 'elementHeight' ] / 15 ).'" fill="#ffff00"/>';
			}
			
			$sSvg .= '<rect x="'.$iX.'" y="'.$iY.'" width="'.$opt[ 'elementWidth' ].'" height="'.$opt[ 'elementHeight' ].'" fill="'.$sColor.'"/>
				<rect x="'.$iX.'" y="'.$iY.'" width="'.$opt[ 'elementWidth' ].'" height="'.( $opt[ 'elementHeight' ] / 2.65 ).'" stroke-width="'.( $opt[ 'elementWidth' ] / 30 ).'" stroke="#000000" fill="#ffffff" ry="1.5" rx="1.5"/>
				<text x="'.( $iX + ( $opt[ 'elementWidth' ] / 2 ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 3.6 ) ).'" style="font-weight:bold;" text-anchor="middle" font-family="sans-serif" font-size="'.( $opt[ 'elementWidth' ] * 0.27 ).'" fill="#000000">'.$oCase[ 'label' ].'</text>
				<rect x="'.( $iX + ( $opt[ 'elementWidth' ] / 2.7 ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 1.58 ) ).'" width="'.( $opt[ 'elementWidth' ] / 4 ).'" height="'.( $opt[ 'elementHeight' ] / 3.4 ).'" fill="#000000"/>
				<rect x="'.( $iX + ( $opt[ 'elementWidth' ] / 3.5 ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 1.58 ) ).'" width="'.( $opt[ 'elementWidth' ] / 2.35 ).'" height="'.( $opt[ 'elementHeight' ] / 4 ).'" fill="#000000"/>
				<rect x="'.( $iX + ( $opt[ 'elementWidth' ] / 8 ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 2 ) ).'" width="'.( $opt[ 'elementWidth' ] / 1.35 ).'" height="'.( $opt[ 'elementHeight' ] / 3 ).'" fill="#000000"/>
				'.$sConductors;
			
			if( isset( $oCase[ 'title' ] ) ){
				$sSvg .= '<text x="'.( $iX + ( $opt[ 'elementWidth' ] / 2 ) ).'" y="'.( $iY + ( $opt[ 'elementHeight' ] / 1.25 ) ).'" text-anchor="middle" font-family="sans-serif" font-size="'.( $opt[ 'elementWidth' ] * 0.3 ).'" fill="#ffffff">'.$oCase[ 'title' ].'</text>';
			}
			if( isset( $oCase[ 'options' ][ 'text' ] ) ){
				$sSvg .= '</g>';
			}
			if( isset( $oCase[ 'options' ][ 'link' ] ) ){
				$sSvg .= '</a>';
			}
			
			return $sSvg;
		}
	}
