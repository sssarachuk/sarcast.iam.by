<?php
/**
 * Description of ExportImport
 *
 * @author vitaly
 */
class ExportImport {

	const LEVEL_SIGN		= "~";

	private static $_excelFields	= array(
		'id'				=> array('name' => 'ID', 'letter' => 'A', 'n' => 0),
		'slug'				=> array('name' => 'Имя страницы', 'letter' => 'B', 'n' => 1),
		'article'			=> array('name' => 'Артикул', 'letter' => 'C', 'n' => 2),
		'pretitle'			=> array('name' => 'Презаголовок', 'letter' => 'D', 'n' => 3),
		'title'				=> array('name' => 'Заголовок', 'letter' => 'E', 'n' => 4),
		'brief'				=> array('name' => 'Краткое описание', 'letter' => 'F', 'n' => 5),
		'description'		=> array('name' => 'Полное описание', 'letter' => 'G', 'n' => 6),
		'quantity'			=> array('name' => 'Кол-во', 'letter' => 'H', 'n' => 7),
		'purchase_price'	=> array('name' => 'Цена закупки', 'letter' => 'I', 'n' => 8),
		'price'				=> array('name' => 'Цена', 'letter' => 'J', 'n' => 9),
		'discount_price1'	=> array('name' => 'Цена со скидкой 1', 'letter' => 'K', 'n' => 10),
		'discount_price2'	=> array('name' => 'Цена со скидкой 2', 'letter' => 'L', 'n' => 11),
		'discount_price3'	=> array('name' => 'Цена со скидкой 3', 'letter' => 'M', 'n' => 12),
		'photos'			=> array('name' => 'Фотографии', 'letter' => 'N', 'n' => 13),
		'meta_title'		=> array('name' => 'Meta Title', 'letter' => 'O', 'n' => 14),
		'meta_keywords'		=> array('name' => 'Meta Keywords', 'letter' => 'P', 'n' => 15),
		'meta_description'	=> array('name' => 'Meta Description', 'letter' => 'Q', 'n' => 16),
		'is_nl2br'			=> array('name' => 'Автоперевод строк', 'letter' => 'R', 'n' => 17),
		'is_hidden'			=> array('name' => 'Спрятано', 'letter' => 'S', 'n' => 18),
		'specification'		=> array('name' => 'Спецификации', 'letter' => 'T', 'n' => 19),
		'definition'		=> array('name' => 'Описание', 'letter' => 'U', 'n' => 20),
		'features'			=> array('name' => 'Характеристики', 'letter' => 'V', 'n' => 21),
		'priority'			=> array('name' => 'Приоритет', 'letter' => 'W', 'n' => 22),
	);

	public static function field($key, $param = 'name') {
		return self::$_excelFields[$key][$param];
	}

	/**
	 * Экспортирует данные о товарах в указанный формат и возвращает количество экспортированных записей
	 * @param <type> $exportFileNameWithDir
	 * @param <type> $format
	 * @return int - records count
	 */
	public static function export($exportFileNameWithDir, $format = 'xlsx') {
		if ($format == 'xlsx') {
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()
				->setCreator(Yii::app()->name)
				->setLastModifiedBy(Yii::app()->name)
				->setTitle(Yii::app()->name)
				->setSubject(Yii::app()->name)
				->setDescription(Yii::app()->name)
				->setKeywords(Yii::app()->name)
				->setCategory(Yii::app()->name);

			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue(self::field('id', 'letter').'1', self::field('id'))
				->setCellValue(self::field('slug', 'letter').'1', self::field('slug'))
				->setCellValue(self::field('article', 'letter').'1', self::field('article'))
				->setCellValue(self::field('pretitle', 'letter').'1', self::field('pretitle'))
				->setCellValue(self::field('title', 'letter').'1', self::field('title'))
				->setCellValue(self::field('brief', 'letter').'1', self::field('brief'))
				->setCellValue(self::field('description', 'letter').'1', self::field('description'))
				->setCellValue(self::field('quantity', 'letter').'1', self::field('quantity'))
				->setCellValue(self::field('purchase_price', 'letter').'1', self::field('purchase_price'))
				->setCellValue(self::field('price', 'letter').'1', self::field('price'))
				->setCellValue(self::field('discount_price1', 'letter').'1', self::field('discount_price1'))
				->setCellValue(self::field('discount_price2', 'letter').'1', self::field('discount_price2'))
				->setCellValue(self::field('discount_price3', 'letter').'1', self::field('discount_price3'))
				->setCellValue(self::field('photos', 'letter').'1', self::field('photos'))
				->setCellValue(self::field('meta_title', 'letter').'1', self::field('meta_title'))
				->setCellValue(self::field('meta_keywords', 'letter').'1', self::field('meta_keywords'))
				->setCellValue(self::field('meta_description', 'letter').'1', self::field('meta_description'))
				->setCellValue(self::field('is_nl2br', 'letter').'1', self::field('is_nl2br'))
				->setCellValue(self::field('is_hidden', 'letter').'1', self::field('is_hidden'))
				->setCellValue(self::field('specification', 'letter').'1', self::field('specification'))
				->setCellValue(self::field('definition', 'letter').'1', self::field('definition'))
				->setCellValue(self::field('features', 'letter').'1', self::field('features'))
				->setCellValue(self::field('priority', 'letter').'1', self::field('priority'));

			/*$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);*/

			$categories = Category::getNodes();
			$i = 2;
			foreach ($categories as $category) {
				$title = str_repeat(self::LEVEL_SIGN, $category->level) . $category->title;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue(self::field('id', 'letter').$i, $category->id)
					->setCellValue(self::field('slug', 'letter').$i, $category->page_name)
					->setCellValue(self::field('title', 'letter').$i, $title)
					->setCellValue(self::field('brief', 'letter').$i, $category->brief)
					->setCellValue(self::field('description', 'letter').$i, $category->description)
					->setCellValue(self::field('photos', 'letter').$i, $category->photos)
					->setCellValue(self::field('meta_title', 'letter').$i, $category->meta_title)
					->setCellValue(self::field('meta_keywords', 'letter').$i, $category->meta_keywords)
					->setCellValue(self::field('meta_description', 'letter').$i, $category->meta_description)
					->setCellValue(self::field('priority', 'letter').$i, $category->priority);
				$catProducts = CategoryProduct::model()->findAll('category_id=?', array($category->id));
				if ($catProducts) {
					$prodIds = Utilities::collectObjectsVars($catProducts, 'product_id');
					$products = Product::model()->findAllByPk($prodIds);
					foreach ($products as $product)	 {
						$i++;
						$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue(self::field('id', 'letter').$i, $product->id)
							->setCellValue(self::field('slug', 'letter').$i, $product->slug)
							->setCellValue(self::field('article', 'letter').$i, $product->article)
							->setCellValue(self::field('pretitle', 'letter').$i, $product->pretitle)
							->setCellValue(self::field('title', 'letter').$i, $product->title)
							->setCellValue(self::field('brief', 'letter').$i, $product->brief)
							->setCellValue(self::field('description', 'letter').$i, $product->description)
							->setCellValue(self::field('quantity', 'letter').$i, $product->quantity)
							->setCellValue(self::field('purchase_price', 'letter').$i, $product->purchase_price)
							->setCellValue(self::field('price', 'letter').$i, $product->price)
							->setCellValue(self::field('discount_price1', 'letter').$i, $product->discount_price1)
							->setCellValue(self::field('discount_price2', 'letter').$i, $product->discount_price2)
							->setCellValue(self::field('discount_price3', 'letter').$i, $product->discount_price3)
							->setCellValue(self::field('photos', 'letter').$i, $product->photos)
							->setCellValue(self::field('meta_title', 'letter').$i, $product->meta_title)
							->setCellValue(self::field('meta_keywords', 'letter').$i, $product->meta_keywords)
							->setCellValue(self::field('meta_description', 'letter').$i, $product->meta_description)
							->setCellValue(self::field('is_nl2br', 'letter').$i, $product->is_nl2br)
							->setCellValue(self::field('is_hidden', 'letter').$i, $product->is_hidden)
							->setCellValue(self::field('specification', 'letter').$i, $product->specification)
							->setCellValue(self::field('definition', 'letter').$i, $product->definition)
							->setCellValue(self::field('features', 'letter').$i, $product->features)
							->setCellValue(self::field('priority', 'letter').$i, $product->priority);
					}
				}
				$i++;
			}
			$objPHPExcel->getActiveSheet()->setTitle(Yii::app()->name . ' Товары');
			$objPHPExcel->setActiveSheetIndex(0);

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$fname = "products.xlsx";
			$objWriter->save($exportFileNameWithDir);
			$count = $i - 2;
			return $count;
		}
	}

	/**
	 * Импортирует записи о товарах в БД
	 * @param <type> $importFile
	 * @param <type> $format
	 * @return array:	'count' => количество записей,
	 *					'messages' => сообщения
	 */
	public static function import($importFile, $format = 'xlsx') {
		$levelSignedCell = self::field('title', 'n');
		$error = 0;
		$messages = array();
		$categoryIDLast = NULL;
		$categoryLevels = array();
		Category::model()->deleteAll();
		Product::model()->deleteAll();
		CategoryProduct::model()->deleteAll();
		if ($format == 'xlsx') {
			$objPHPExcel = PHPExcel_IOFactory::load($importFile);
			$sheet = $objPHPExcel->getSheet();
			$cells = $sheet->toArray();
			for ($i = 2, $in = sizeof($cells); $i <= $in; $i++) {
				$cell = $cells[$i];
				if (!isset($cell[self::field('title', 'n')])) {
					$messages[] = 'Критическая ошибка: Не заполнена ячейка ' . self::field('title') . ' в строке №' . $i;
					$error = $i - 1;
					break;
				}
				if (!isset($cell[self::field('slug', 'n')])) {
					$messages[] = 'Критическая ошибка: Не заполнена ячейка ' . self::field('slug') . ' в строке №' . $i;
					$error = $i - 1;
					break;
				}
				$level = 0;
				for ($j = 0, $jn = strlen($cell[$levelSignedCell]); $j < $jn; $j++) {
					if ($cell[$levelSignedCell][$j] == self::LEVEL_SIGN) {
						$level++;
					} else {
						break;
					}
				}
				if ($level == 0) {
					$messages[] = 'Найден товар ' . $cell[self::field('slug', 'n')];

					//проверяем, существует ли текущий товар в БД
					//$product = Product::model()->find('slug=?', array($cell[1]));
					$product = Product::model()->findByPk($cell[self::field('id', 'n')]);
					if ($product) {
						$messages[] = 'В БД уже имеется товар ' . $cell[self::field('slug')] . ' из строки №' . $i;
					} else {
						//добавляем товар
						$product = new Product();
						$product->id = $cell[self::field('id', 'n')];
						$product->slug = $cell[self::field('slug', 'n')];
						$product->article = $cell[self::field('article', 'n')];
						$product->pretitle = $cell[self::field('pretitle', 'n')];
						$product->title = $cell[self::field('title', 'n')];
						$product->brief = $cell[self::field('brief', 'n')];
						$product->description = $cell[self::field('description', 'n')];
						$product->quantity = $cell[self::field('quantity', 'n')];
						$product->purchase_price = $cell[self::field('purchase_price', 'n')];
						$product->price = $cell[self::field('price', 'n')];
						$product->photos = $cell[self::field('photos', 'n')];
						$product->meta_title = $cell[self::field('meta_title', 'n')];
						$product->meta_keywords = $cell[self::field('meta_keywords', 'n')];
						$product->meta_description = $cell[self::field('meta_description', 'n')];
						$product->is_nl2br = $cell[self::field('is_nl2br', 'n')];
						$product->is_hidden = $cell[self::field('is_hidden', 'n')];
						$product->specification = $cell[self::field('specification', 'n')];
						$product->definition = $cell[self::field('definition', 'n')];
						$product->features = $cell[self::field('features', 'n')];
						$product->priority = $cell[self::field('priority', 'n')];
						$product->categories = array($categoryIDLast);
						$r = $product->save();
						if ($r) {
							$messages[] = 'Добавлен товар ' . $cell[self::field('slug', 'n')] . ' из строки №' . $i;
						} else {
							$messages[] = 'Ошибка добавления товара ' . $cell[self::field('slug', 'n')] . ' из строки №' . $i;
						}
					}
					if ($categoryIDLast) {
						$product->setCategories(array($categoryIDLast), TRUE);
						$messages[] = 'Товар ' . $cell[self::field('slug', 'n')] . ' из строки №' . $i . ' добавлен в категорию ID=' . $categoryIDLast;
					} else {
						$messages[] = 'Ошибка: отсутствует категория для товара ' . $cell[self::field('slug', 'n')] . ' из строки №' . $i;
					}
				} else {
					$catTitle = substr($cell[$levelSignedCell], $level);
					$messages[] = 'Найдена категория ' . $catTitle;

					//добавляем категорию
					$category = new Category();
					$category->id = $cell[self::field('id', 'n')];
					$category->title = $catTitle;
					$category->page_name = $cell[self::field('slug', 'n')];
					$category->brief = $cell[self::field('brief', 'n')];
					$category->description = $cell[self::field('description', 'n')];
					$category->photos = $cell[self::field('photos', 'n')];
					$category->meta_title = $cell[self::field('meta_title', 'n')];
					$category->meta_keywords = $cell[self::field('meta_keywords', 'n')];
					$category->meta_description = $cell[self::field('meta_description', 'n')];
					$category->priority = $cell[self::field('priority', 'n')];
					
					if (isset($categoryLevels[$level-1])) {
						$root = $categoryLevels[$level-1];
						$r = $root->append($category);
					} else {
						$r = $category->tree->save();
					}
					if ($r) {
						$messages[] = 'Добавлена категория ' . $catTitle;
					} else {
						$messages[] = 'Ошибка добавления категории ' . $catTitle;
					}
					$categoryIDLast = $category->id;
					$categoryLevels[$level] = $category;
				}
				$messages[] = '<hr />';
			}
			$count = $i - 2;
			return array(
				'count' => $count,
				'messages' => $messages
			);
		}
	}

}
