<?php
header ( "content-type:text/html;charset=utf=8" );
class ScheduleController extends Controller {
	public function actionSchedule_Set() {
		$count_sql = "SELECT count(*) count FROM vcos_admin_role WHERE role_id > 1 ORDER BY role_id DESC";
		$count = Yii::app ()->m_db->createCommand ( $count_sql )->queryRow ();
		$criteria = new CDbCriteria ();
		$count = $count ['count'];
		$pager = new CPagination ( $count );
		$pager->pageSize = 10;
		$pager->applyLimit ( $criteria );
		$sql = "SELECT * FROM vcos_admin_role WHERE role_id > 1 ORDER BY role_id DESC LIMIT {$criteria->offset}, 10";
		$role = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		// var_dump ( $role );
		$this->render ( 'schedule_set', array (
				'pages' => $pager,
				'auth' => $this->auth,
				'role' => $role 
		) );
	}
	public function actionSchedule_Search() {
		// $this->actionExport ();
		// $this->render ( 'schedule_search' );
		$this->export ();
	}
	
	// sfhskfjhsfh
	public function export() {
		$objectPHPExcel = new PHPExcel ();
		$objectPHPExcel->setActiveSheetIndex ( 0 );
		
		$page_size = 5;
		// 数据的取出
		// $model = Yii::app ()->session ['printdata'];
		
		// $dataProvider = $model->search ();
		
		// $dataProvider->setPagination ( false );
		// $data = $dataProvider->getData ();
		
		$sql = "SELECT * FROM vcos_train";
		$data = Yii::app ()->db->createCommand ( $sql )->queryAll ();
		$countsql = "SELECT count(*) as count FROM vcos_train";
		$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数 // 总页数的算出
		$page_count = ( int ) ($count / $page_size) + 1;
		$current_page = 0;
		
		$n = 0;
		foreach ( $data as $product ) {
			if ($n % $page_size === 0) {
				$current_page = $current_page + 1;
				
				// 报表头的输出
				$objectPHPExcel->getActiveSheet ()->mergeCells ( 'B1:G1' );
				$objectPHPExcel->getActiveSheet ()->setCellValue ( 'B1', '产品信息表' );
				
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'B2', '产品信息表' );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'B2', '产品信息表' );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->getStyle ( 'B1' )->getFont ()->setSize ( 24 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->getStyle ( 'B1' )->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );
				
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'B2', '日期：' . date ( "Y年m月j日" ) );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'G2', '第' . $current_page . '/' . $page_count . '页' );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->getStyle ( 'G2' )->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_RIGHT );
				
				// 表格头的输出
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'A' )->setWidth ( 5 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'B3', '编号' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'B' )->setWidth ( 6.5 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'C3', '名称' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'C' )->setWidth ( 17 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'D3', '生产厂家' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'D' )->setWidth ( 22 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'E3', '单位' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'E' )->setWidth ( 15 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'F3', '单价' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'F' )->setWidth ( 15 );
				$objectPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'G3', '在库数' );
				$objectPHPExcel->getActiveSheet ()->getColumnDimension ( 'G' )->setWidth ( 15 );
				
				// 设置居中
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );
				
				// 设置边框
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getBorders ()->getTop ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getBorders ()->getLeft ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getBorders ()->getRight ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getBorders ()->getBottom ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getBorders ()->getVertical ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
				
				// 设置颜色
				$objectPHPExcel->getActiveSheet ()->getStyle ( 'B3:G3' )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID )->getStartColor ()->setARGB ( 'FF66CCCC' );
			}
			// 明细的输出
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'B' . ($n + 4), $product ['train_id'] );
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'C' . ($n + 4), $product ['train_name'] );
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'D' . ($n + 4), $product ['train_code'] );
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'E' . ($n + 4), $product ['remark'] );
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'F' . ($n + 4), $product ['train_name'] );
			$objectPHPExcel->getActiveSheet ()->setCellValue ( 'G' . ($n + 4), $n );
			// 设置边框
			$currentRowNum = $n + 4;
			$objectPHPExcel->getActiveSheet ()->getStyle ( 'B' . ($n + 4) . ':G' . $currentRowNum )->getBorders ()->getTop ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
			$objectPHPExcel->getActiveSheet ()->getStyle ( 'B' . ($n + 4) . ':G' . $currentRowNum )->getBorders ()->getLeft ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
			$objectPHPExcel->getActiveSheet ()->getStyle ( 'B' . ($n + 4) . ':G' . $currentRowNum )->getBorders ()->getRight ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
			$objectPHPExcel->getActiveSheet ()->getStyle ( 'B' . ($n + 4) . ':G' . $currentRowNum )->getBorders ()->getBottom ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
			$objectPHPExcel->getActiveSheet ()->getStyle ( 'B' . ($n + 4) . ':G' . $currentRowNum )->getBorders ()->getVertical ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
			$n = $n + 1;
		}
		
		// 设置分页显示
		// $objectPHPExcel->getActiveSheet()->setBreak( 'I55' , PHPExcel_Worksheet::BREAK_ROW );
		// $objectPHPExcel->getActiveSheet()->setBreak( 'I10' , PHPExcel_Worksheet::BREAK_COLUMN );
		$objectPHPExcel->getActiveSheet ()->getPageSetup ()->setHorizontalCentered ( true );
		$objectPHPExcel->getActiveSheet ()->getPageSetup ()->setVerticalCentered ( false );
		
		ob_end_clean ();
		ob_start ();
		
		header ( 'Content-Type : application/vnd.ms-excel' );
		header ( 'Content-Disposition:attachment;filename="' . '产品信息表-' . date ( "Y年m月j日" ) . '.xls"' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objectPHPExcel, 'Excel5' );
		$objWriter->save ( 'php://output' );
	}
}