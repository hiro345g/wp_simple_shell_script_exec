# WordPress simple shell script execute plugin

WordPress の管理画面から自作のシェルスクリプトを実行することができるプラグインです。

## インストール

WordPress のプラグイン用ディレクトリが /var/www/html/wordpress/wp-content/plugins/ だとします。
wp_simple_shell_script_exec ディレクトリをコピーします。

```console
sudo cp -r wp_simple_shell_script_exec/ /var/www/html/wordpress/wp-content/plugins/
```

実行したいシェルスクリプト script.sh を wp_simple_shell_script_exec ディレクトリに用意します。
ここでは例として `echo "hello"` のスクリプトを置きます。

```console
echo 'echo "hello"' | sudo tee -a /var/www/html/wordpress/wp-content/plugins/wp_simple_shell_script_exec/script.sh'
```

## 利用方法

WordPress の管理画面で、wp_simple_shell_script_exec を有効にするとダッシュボードに WP SSS Exec のメニューが表示されます。

メニューを開いて表示される画面で「Execute」をクリックすると、script.sh が実行されます。

結果は wp_simple_shell_script_exec ディレクトリの result.txt に記録されます。また、管理画面にも表示されます。
