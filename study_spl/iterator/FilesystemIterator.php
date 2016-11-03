<?php
/** PHP标准库-迭代器-文件系统迭代器
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.filesystemiterator.php
 * FilesystemIterator extends DirectoryIterator implements SeekableIterator {
 * //类常量
 * const integer CURRENT_AS_PATHNAME = 32 ;
 * const integer CURRENT_AS_FILEINFO = 0 ;
 * const integer CURRENT_AS_SELF = 16 ;
 * const integer CURRENT_MODE_MASK = 240 ;
 * const integer KEY_AS_PATHNAME = 0 ;
 * const integer KEY_AS_FILENAME = 256 ;
 * const integer FOLLOW_SYMLINKS = 512 ;
 * const integer KEY_MODE_MASK = 3840 ;
 * const integer NEW_CURRENT_AND_KEY = 256 ;
 * const integer SKIP_DOTS = 4096 ;
 * const integer UNIX_PATHS = 8192 ;
 * //类方法
 * public __construct ( string $path [, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS ] )
 * public mixed current ( void )
 * public int getFlags ( void )
 * public string key ( void )
 * public void next ( void )
 * public void rewind ( void )
 * public void setFlags ([ int $flags ] )
 * //继承方法
 * public DirectoryIterator DirectoryIterator::current ( void )
 * public int DirectoryIterator::getATime ( void )
 * public string DirectoryIterator::getBasename ([ string $suffix ] )
 * public int DirectoryIterator::getCTime ( void )
 * public string DirectoryIterator::getExtension ( void )
 * public string DirectoryIterator::getFilename ( void )
 * public int DirectoryIterator::getGroup ( void )
 * public int DirectoryIterator::getInode ( void )
 * public int DirectoryIterator::getMTime ( void )
 * public int DirectoryIterator::getOwner ( void )
 * public string DirectoryIterator::getPath ( void )
 * public string DirectoryIterator::getPathname ( void )
 * public int DirectoryIterator::getPerms ( void )
 * public int DirectoryIterator::getSize ( void )
 * public string DirectoryIterator::getType ( void )
 * public bool DirectoryIterator::isDir ( void )
 * public bool DirectoryIterator::isDot ( void )
 * public bool DirectoryIterator::isExecutable ( void )
 * public bool DirectoryIterator::isFile ( void )
 * public bool DirectoryIterator::isLink ( void )
 * public bool DirectoryIterator::isReadable ( void )
 * public bool DirectoryIterator::isWritable ( void )
 * public string DirectoryIterator::key ( void )
 * public void DirectoryIterator::next ( void )
 * public void DirectoryIterator::rewind ( void )
 * public void DirectoryIterator::seek ( int $position )
 * public string DirectoryIterator::__toString ( void )
 * public bool DirectoryIterator::valid ( void )
 * }
 */

//新建一个文件系统迭代器，参数是一个目录
echo "Now new a FilesystemIterator iterator ... ", PHP_EOL;
$dit = new FilesystemIterator(__DIR__);

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
//我们发现基本类似DirectoryIterator目录迭代器，只是少了 .(当前目录) ..(上级目录) 两个目录
echo "We found that it is similar to DirectoryIterator, except less two directory . and ..", PHP_EOL;

//现在，我们定位到某个位置，输出那个位置的目录信息
echo "Now display the element after seek to index 2 .", PHP_EOL;
$dit->rewind(); // 重置迭代器指针
//由于文件系统迭代器实现了SeekableIterator，所以才可以定位到某位置
$dit->seek(2);

//打印当前位置的文件信息
echo $dit;
