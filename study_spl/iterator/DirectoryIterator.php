<?php
/** PHP标准库-迭代器-目录迭代器
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.directoryiterator.php
 * DirectoryIterator extends SplFileInfo implements SeekableIterator {
 * //注意 SeekableIterator 继承了Iterator, Traversable【php类只能单继承，接口可以多继承】
 * //类方法
 * public __construct ( string $path )
 * public DirectoryIterator current ( void )
 * public int getATime ( void )
 * public string getBasename ([ string $suffix ] )
 * public int getCTime ( void )
 * public string getExtension ( void )
 * public string getFilename ( void )
 * public int getGroup ( void )
 * public int getInode ( void )
 * public int getMTime ( void )
 * public int getOwner ( void )
 * public string getPath ( void )
 * public string getPathname ( void )
 * public int getPerms ( void )
 * public int getSize ( void )
 * public string getType ( void )
 * public bool isDir ( void )
 * public bool isDot ( void )
 * public bool isExecutable ( void )
 * public bool isFile ( void )
 * public bool isLink ( void )
 * public bool isReadable ( void )
 * public bool isWritable ( void )
 * public string key ( void )
 * public void next ( void )
 * public void rewind ( void )
 * public void seek ( int $position )
 * public string __toString ( void )
 * public bool valid ( void )
 * }
 */

//新建一个目录迭代器，参数是一个目录
echo "Now new a directory iterator ... ", PHP_EOL;
$dit = new DirectoryIterator(__DIR__);

//下面来仿一下windows下的dir命令列出当前问价目录列表信息
//所有获取目录文件信息的方法继承自SplFileInfo
//注意，这里用foreach来循环，当然还可以用while来循环
echo "Now display current directory list like windows terminal command dir:", PHP_EOL;
foreach ($dit as $it) {
    printf("%s %8s %s",
        date('Y/m/d H:i', $it->getCTime()),
        $it->isDir() ? '<DIR>' : '',
        $it
    );
    echo PHP_EOL;
}

//现在，我们定位到某个位置，输出那个位置的目录信息
echo "Now display the element after seek to index 3 .", PHP_EOL;
$dit->rewind(); // 重置迭代器指针
//由于目录迭代器实现了SeekableIterator，所以才可以定位到某位置
$dit->seek(3);

//打印当前位置的文件目录信息
echo $dit;
