<!DOCTYPE html>
<html>
<head>
    <title>Администрирование</title>
    <style type="text/css">
        @import url("Style.css");
        body{
            background-color: hsl(256, 100%, 5%);
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #73039c;
            outline: none;
        }

        .btn {
            background-color: #73039c;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btn:hover {
            opacity: 1;
        }

        h2, label {
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2><big>Добавление</big></h2>
    <form id="add-form">
        <table>
            <tr>
                <th>Команда:</th>
                <th>Игры:</th>
                <th>Победы:</th>
                <th>Ничьи:</th>
                <th>Поражения:</th>
                <th>Очки:</th>
            </tr>
            <tr>
                <th><input type="text" name="Команда" required></th>
                <th><input type="text" name="Игры" required></th>
                <th><input type="text" name="Победы" required></th>
                <th><input type="text" name="Ничьи" required></th>
                <th><input type="text" name="Поражения" required></th>
                <th><input type="text" name="Очки" required></th>
            </tr>
            <tr>
                <th colspan="6"><button type="submit" class="btn">Добавить</button></th>
            </tr>
        </table>
    </form>

    <h2><big>Удаление</big></h2>
    <form id="delete-form">
        <table>
            <tr>
                <th>Команда:</th>
            </tr>
            <tr>
                <th>
                    <select name="Команда" id="delete-team">
                        <!-- Данные будут загружены AJAX-ом -->
                    </select>
                </th>
            </tr>
            <tr>
                <th colspan="6"><button type="submit" class="btn">Удалить</button></th>
            </tr>
        </table>
    </form>

    <h2><big>Изменение</big></h2>
    <form id="update-form">
        <table>
            <tr>
                <th>Команда:</th>
            </tr>
            <tr>
                <th>
                    <select name="Команда" id="update-team">
                        <!-- Данные будут загружены AJAX-ом -->
                    </select>
                </th>
            </tr>
            <tr>
                <th><input type="text" name="Игры" placeholder="Игры"></th>
                <th><input type="text" name="Победы" placeholder="Победы"></th>
                <th><input type="text" name="Ничьи" placeholder="Ничьи"></th>
                <th><input type="text" name="Поражения" placeholder="Поражения"></th>
                <th><input type="text" name="Очки" placeholder="Очки"></th>
            </tr>
            <tr>
                <th colspan="6"><button type="submit" class="btn">Изменить</button></th>
            </tr>
        </table>
    </form>

    <script>
        $(document).ready(function() {
            // Функция загрузки списка команд
            function loadTeams() {
                $.ajax({
                    url: 'get_teams.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#delete-team, #update-team').empty();
                        $.each(data, function(index, team) {
                            $('#delete-team, #update-team').append(`<option value="${team}">${team}</option>`);
                        });
                    }
                });
            }

            loadTeams();

            
            $('#add-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'add_team.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        loadTeams();
                    }
                });
            });

            
            $('#delete-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'delete_team.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        loadTeams();
                    }
                });
            });

            
            $('#update-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'update_team.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        loadTeams();
                    }
                });
            });
        });
    </script>
</body>
</html>
