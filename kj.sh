server=`ps -aux | grep /www/wwwroot/treasure_test/cli.php | grep -v grep`
        if [ ! "$server" ]; then
                nohup php /www/wwwroot/treasure_test/cli.php admin/award &
                echo "restart process success"
        fi