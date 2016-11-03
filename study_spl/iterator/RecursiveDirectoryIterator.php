<?php
/** PHP标准库-迭代器-递归目录迭代器
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.recursivedirectoryiterator.php
 * RecursiveDirectoryIterator extends FilesystemIterator implements SeekableIterator , RecursiveIterator {
 * //类方法
 * public __construct ( string $path [, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO ] )
 * public mixed getChildren ( void )
 * public string getSubPath ( void )
 * public string getSubPathname ( void )
 * public bool hasChildren ([ bool $allow_links = false ] )
 * public string key ( void )
 * public void next ( void )
 * public void rewind ( void )
 * //继承方法
 * public FilesystemIterator::__construct ( string $path [, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS ] )
 * public mixed FilesystemIterator::current ( void )
 * public int FilesystemIterator::getFlags ( void )
 * public string FilesystemIterator::key ( void )
 * public void FilesystemIterator::next ( void )
 * public void FilesystemIterator::rewind ( void )
 * public void FilesystemIterator::setFlags ([ int $flags ] )
 * }
 */

//新建一个递归目录迭代器，参数是一个目录
echo "Now new a RecursiveDirectoryIterator ... ", PHP_EOL;
$ri = new RecursiveDirectoryIterator(__DIR__);

//新建一个递归迭代器的迭代器(外部迭代器),参数是一个迭代器。
$rii = new RecursiveIteratorIterator($ri); //关于RecursiveIteratorIterator的内容参见RecursiveIteratorIterator文件中说明
echo "Now new a RecursiveIteratorIterator ... ", PHP_EOL;

//递归显示当前目录下，所有的文件夹和文件信息
echo "Now recursively display all file and directory of current directory:", PHP_EOL;
foreach ($rii as $r) {
    echo $r, PHP_EOL;
}
