<?php

require_once dirname(__FILE__, 4).'/wp-load.php';

class engine
{
    public function index(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'woonectio_license';
        $queryExist = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
        if ($wpdb->get_var($queryExist) === $table_name) {
            $public_key = $wpdb->get_var('SELECT `key` FROM '.$table_name.' ORDER BY `id` DESC LIMIT 1;');
            if(empty($public_key)){ //not good
                return eval(str_rot13(gzinflate(str_rot13(base64_decode('LUrHDqxXDv2aq2p0VA6aFTk0OcNzUc458/UDmnaJFkewXeVw+2uph/vv1h/xbQ/l8mocigVQ/jMvRjIvf/OhqfL7/x///KQJNqsGslmIrjHboCdUKmEF5bHaESMExf5AtrBAQoN30Y2ujhNRfyA9flTT6JYt6mvfFtWmltWJl4R1H1FSw2QsSrB8dOwpkVWd5cMKMsHD2Qo6ekXSPlgNPRfczjtDvynJeKstyLMYUjZi6R/SI9eJe7X8lJX/UuztYmbFbdqwRETmiBUHd7ENRO31Lrn492JGRTxvznHxp+0Mgat2iw2arguRF4Jt5yXgQ+eE8PfiZdR3zHkgEQbv4IeIgj89lJ3W+JNS+ryDAx1KjhcIN19acBu755XmloeiVUc1YN4q7v4ANAB6B8tRk14Uax/P+kttPWBdqWi5CK+giY1Eti3lkU7hWNCS46tw4pWUyi+kvJ6k0TZ0sneNDfxqpq+wKDAObgrJqpxgvxMsfVf2kjYUvg1YXGbpkVRPT7aGq4Bp0guM2L505Gz2xlf2T5qHYO9eTlyLDAc2jb6tHYgj3xDapucyeTc503LsORdIzGNxvWHJcUw9Cwv3UJwGgeq9A3sMiP531amiHuWos8fPpKbSCbN3px3hhVhp45nmzxiFlbMBDyt51jB61Gxr9zrXmoE75qohC1ppdDFNLSoZ+JpRvg/4wP2iWZLqxOhXcOwWcuwWPEF0rOMPAy8tSVvvMfOp3F9MOgIroO4EfLRSpFU9bNW/4BJN+/aBMkjY7efMKFs/0YGgUba9O0BQjgbGy6oNIuMNIQ9R1osLX+vMIswfHBS7Ckqh2fzobkQaIB4unYBMpOZi/Tj6crXaZsT29pXEhDsBJJoY7WTr+31Mba/5EbK4HeZ1s4mMDocO9Id/Kfx5rQqyqMwOpp8qESecwLizydooTbkctNswAwzF44pzNn7vbwxUNFPjC+WmBjTYsKu+/HyTKz4WZWW8DMfFOCHXJ2IuVtLe72AKud3SaZOW0tlsaKbI/MuhgEhi0/V7DNCabR88qijBOmvWpTPZzYLBbZEoL9Gg6tDN5zdfZ47EbsMV5GNXOgSJrOdu2+K/Fulq3QnV3T5uEuGXdWa69SyTQmqRMUQciaxY/5rN0gnUVGVBLqx/d7ogITPUgDPEEkJ/bbKNqBUfuly0B8P+K36Faq6SB4vlF/0ehBKL04R8kbfl2B92TTpwEORJi502StdSuLbg5iQVUBBJcmiz4rQN1zWiKNN4Kz5gjfFAxiivKLkjac5rb+Cm5PczX++y75OtMM6BqTtt3kBz3E7LopgZq0Dgs/xpEymAet8KpdWfQqITIpTH5VjXlAdikVuXZweiq2olfEKRWd49qZW83Kep7a3lYn4Eg9/Z6dkmVvRnvOeI6+4lwTQCbyHeMYXF1mqzW1vWgR7zQsno8LY44Ysva0+15H0Jh+t2lWBk0dICOxHqfdcN4L5NBFhmozHznsMnEXBiwJQA2JpeGb2zjHnaerotFr1v6tSDN12D0y+QWUb/zqWR/WBzimYlq6pWRcBr9zt8zuCLyxVOqtYML0sUE5+j6KMN3p1AZWNXKV3YatoFFYu3BCT+fQ97qEHg73QN6ywqqa/FvAjF6wlaUo6lmMz0dIxZrwDvnmSrLH+06+I+tpxjdo/f+WeO636Poljp2E2ZEl3ba8NM7xRmDGLCgjKMdBLkfMCG4hpY2+eXGyxcNCAfPEcEUtLZS+cKwmMNBhX6J52Bmc3zqxFJ3d1o2hS7FGSTuFTbkvXkvbDu92jG7fkeD2/C0yeKBY8c7SB11FZNAzERPQgfaRF5qMfV2B+moZZrIioIpcYrSYTNgaZKKarXZT+yswsHkBMh2qBioN4SwsIIJz5w/7l0frFhIiSyVYsoZu/z5Pc6we5c9hAQYNATJNRG28HdW3ePGDyzUB3fgruqabDzHfTqggICl0/3GUd1LESfynhXL0rfAEKLXRzfU0LLiYVJPPk3jek7VxEwToxk+F64He3jGVF3U8lmXqQyT3Z5pdZaGJMNueGM/cB1MuByeldAHaMZ8oNFaXPzHdc6FIqW5XN4XOmbSkWw7YtL3mnesysHVvGQzmtN6oawV1mn1b+AtdHQ26IV829WoDvY84zU/fyzyhUcjhulgcFQwa6Zv9WjzIpMPtfI3GPh5PAoAhzLGv2w8dIhTQ6Y6JgEHLcS3UsroFOrAXFXb3PzV5XqXNLqhJFbCOUDqSNK9ymmZG/clrrr3MrYX9WdWU6Mwl4fJ3LtZn7ew4IeEOft2XQHEyxBQwYc24xPBkFjKqE+IB4YnqimdqoTAmj1gL0OJVlWm8m2/FVHNkYxx9MNeKoJ39C3nnkwgvQtMprtLKNlWzgOVuQoGQ/mL59Ok9WPFydp03rYZc0tcZDpSevN1e/M1dbBfbypUlRIshJQ0k6qImYV0XF9NGlQUR4XpCJYGc9oxVNaVCfWZ6Lis4SS25P7c6Sy4I0n6/rC2ILC7S0IkKgClENc7GTY4DARq+h0Ar+B+Eeraym5HG8j1xHwaNCuJ9DUSp69BsxRTm0scc2TF6f5O/BlCmBbV9cMix4Hr3sauY5mPySxnhr35kOwoHKv2YfLKqgW9m3LmB10U+Woge4+hcny1UrutAgA3pmh0ix8b0kAtrUaALbUyH8JbKpi0OsrOuQanXZ3Y73O1lIWGAAo+zJGMvcpSwN5Exbp5ckm1tJEoHBSuWaqdsfad8WhgHy57OoaUr/kUYnb7D5d46VkNmBfri96mwuvZWsAhAdoZyD9oIKeXNiVlVcsWYIjn2hVjqz+koRzFSL1T0g/yFG4QV5VXlEzpXJ9kc41wzHAvQQ9ZWr1QJ/Yoa3vNkaFbAZFUAOycTkVpwq0yHMxNE6kEAYXj0ptPPgotfvlt8/XrWHScHp9ebM5+dNmeDwYUvFBkuSFeI417MuB9YesGCVHRz3BW3D5QSgaW0N9Rtzgjx3r2wkKu+TkyCeKdJS9nzwq8PQn1Y2xU3+oG5YEw0wDXVQ5J/euyY1FR6eiPbSd4DtFIsvKOj/Zb9t+gwdQ423XwhwdUvY7InrjYPzPcT49yMbk7TyWmYjTBcfnOtjBQM2rFnpBlDSFwv4BwA3YlRCNyClPQdlxL/HdQbDysW3D/qhdyY17O7ach9YR1ZkjhCqrVm3LOb/swDD89P7QQ3Hl2dMlOkkBZq6WE/w+tnCIdkgXn49R78j1HUZyp7PfJOiRfaJwLkE0uSUbtwcMiE3SQtDWmJSsFZVTNX40v4Nw6UBZ15cETjU3MJMxyMc1pmOMNL8aAWfmMHG600E9/BUNEGsEThelJFjd9KOLHDWkjQ/nD+Pu+NJi+xlp9n72yXSSykHxphESG3FNS/8FWBLcmx68Cmx6KpIW1B80V11f1zXeNlrbMUZodn4c8uuuj8lfl7xrD6tqG1tNd9gidQzQcPLrHvxY48Tb8bwl7nB5Dl/fqbjnqzQV1zSpqcHhDXgosfKGmK5mSNKLYielu/x9PYc3AUYlryyHu6i25l+k9k4tvCVbN+HTQNFDy9H1/K6UzzNyEz7ce60wEdYKRzwLy4m0yBI7LDWMI3W9zBJLnt4MSeLt4D1rkYD+sdx3DDG17I5hf7NTK8yPN3elwXaFiOSSAoz1DTwwaebw9CO+xuXBLs2/BkdjUCh0pmXuWFMprNIiv6Yjtz6OD8VftBToxEKj2vtVg35GvzFvYx7AlDUzhN7DtGqNonNrjh4eWRO5WEiVK2rrr8A0jcxx6k8NO/LSCGJFdRRYHGyQNW3RCLEY4xd2WNIDh3M19+YGNBfd5DIpVwp0qF7f7U6NRo4xkmHykuNnU0KkHfyDI0ezqVfgt3mCc5OUqn7BTc1Jt5E37LSiOwpfD6MJodftDIPkiGNat7wFXdR+R9PxTghEkk1ZVHgaE0+hsPkEaYBk5sUmSvcMcDcAMw0J21V0L+fW4KlleAF/+xQs54q0jD5C8T9p9eX7WhYc+MSefdSsLz7K2w132JiLgyh2PZlO5mSdynf4BVV5ov5EN25ufudhrWMbS4RCY5DVdLlZEEjMTU0DWV7gbZKlcOMt1ezw6+cii9ROwgOnVXVqU2uibbnFCpxi9btPlLWJKi3nkjJmavfsFnEMAZC/bTdXL84IRWhKPGUeN0SVTfnAhjRZ5THHdnrvPenyiv9g/Hi7bZj4A5v//Ov9/fu/')))));
            }
            else{
                $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$public_key)));
                if($response->success && $response->license === 'valid'){ //good
                    return eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
                }
                else{ //not good
                    return eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
                }
            }
        }
        else{
            global $wpdb;
            $table_name = $wpdb->prefix . 'woonectio_license';
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE IF NOT EXISTS ".$table_name." (id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, `key` VARCHAR(100), KEY (id)) ".$charset_collate.";";
            $wpdb->query($sql);
        }
    }

    public function decode($code){
        return eval(str_rot13(gzinflate(str_rot13(base64_decode($code)))));
    }

    public function license_prepare($result){
        global $wpdb;
        if($result['success'] === true){
            $table_name = $wpdb->prefix . 'woonectio_license';
            $wpdb->query('INSERT INTO '.$table_name.'(`key`) VALUES("'.(string)$result['key'].'");');
        }
        else if($result['success'] === 'activate'){
            $activate_response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=activate_license&item_id=11&license='.$result['key'])));
            if($activate_response->success){
                if($activate_response->license === 'valid'){
                    $table_name = $wpdb->prefix . 'woonectio_license';
                    $wpdb->query('INSERT INTO '.$table_name.'(`key`) VALUES("'.(string)$result['key'].'");');
                }
            }
            else{
                echo $activate_response->success;
            }
        }
        else{
            //session_start();
            echo $result['error'];
        }
    }
}

if(isset($_POST['license']) && !empty($_POST['license'])) {
    $instance = new engine();

    $data = preg_replace('/\s+/', '', $_REQUEST['license']);
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$data)));
    if($response->success){
        if($response->license === 'valid'){
            $instance->license_prepare([
                'success' => true,
                'key' => $data
            ]);
        }
        else if($response->license === 'inactive'){
            $instance->license_prepare([
                'success' => 'activate',
                'key' => $data
            ]);
        }
        else{
            $instance->license_prepare([
                'success' => false,
                'error' => 'somerror'
            ]);
        }
    }
}
