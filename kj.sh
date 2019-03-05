server=`ps -aux | grep '/www/wwwroot/treasure/cli.php admin/award' | grep -v grep`
        if [ ! "$server" ]; then
                nohup php /www/wwwroot/treasure/cli.php admin/award &
                echo "restart process success"
        fi