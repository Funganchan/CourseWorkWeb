<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <style>
        .player {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            overflow: hidden;
        }
        .player input {
            margin-bottom: 5px;
        }
        .player img {
            float: right;
            max-width: 100px;
            max-height: 100px;
            margin-left: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Управление игроками</h1>
    <div id="players-list"></div>

    <h2>Добавить нового игрока</h2>
    <form id="add-player-form" enctype="multipart/form-data">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" placeholder="Имя" required autocomplete="name"><br>

        <label for="position">Позиция:</label>
        <input type="text" id="position" name="position" placeholder="Позиция" required><br>

        <label for="goals">Голы:</label>
        <input type="number" id="goals" name="goals" placeholder="Голы" required><br>

        <label for="assists">Передачи:</label>
        <input type="number" id="assists" name="assists" placeholder="Передачи" required><br>

        <label for="player_image">Изображение игрока:</label>
        <input type="file" id="player_image" name="player_image" required><br>

        <button type="submit">Добавить</button>
    </form>

    <script>
        $(document).ready(function() {
            function loadPlayers() {
                $.ajax({
                    url: 'get_players.php',  
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#players-list').empty();
                        $.each(data, function(index, player) {
                            $('#players-list').append(`
                                <div class="player" data-id="${player.id}">
                                    <img src="pictures/${player.img}" alt="${player.name}">
                                    <input type="text" value="${player.name}" data-field="name">
                                    <input type="text" value="${player.position}" data-field="position">
                                    <input type="number" value="${player.goals}" data-field="goals">
                                    <input type="number" value="${player.assists}" data-field="assists">
                                    <button class="update-player">Сохранить</button>
                                    <button class="delete-player">Удалить</button>
                                </div>`);
                        });
                    }
                });
            }

            loadPlayers();

            // $('#add-player-form').on('submit', function(e) {
            //     e.preventDefault();
            //     var formData = new FormData(this); // использует FormData для загрузки файлов
            //     $.ajax({
            //         url: 'add_player.php',
            //         method: 'POST',
            //         data: formData,
            //         contentType: false,
            //         processData: false,
            //         success: function(data) {
            //             alert(data.message);
            //             loadPlayers();
            //         }

            //     });
            // });

            $('#add-player-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'add_player.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        loadPlayers();
                    }
                });
            });

            $('#players-list').on('click', '.update-player', function() {
                var playerDiv = $(this).closest('.player');
                var id = playerDiv.data('id');
                var updatedData = {
                    id: id,
                    name: playerDiv.find('input[data-field="name"]').val(),
                    position: playerDiv.find('input[data-field="position"]').val(),
                    goals: playerDiv.find('input[data-field="goals"]').val(),
                    assists: playerDiv.find('input[data-field="assists"]').val()
                };
                $.ajax({
                    url: 'update_player.php',
                    method: 'POST',
                    data: updatedData,
                    dataType: 'json',
                    success: function(data) {
                        alert(data.message);
                        loadPlayers();
                    }
                });
            });

            $('#players-list').on('click', '.delete-player', function() {
                if (confirm('Вы уверены, что хотите удалить этого игрока?')) {
                    var playerDiv = $(this).closest('.player');
                    var id = playerDiv.data('id');
                    $.ajax({
                        url: 'delete_player.php',
                        method: 'POST',
                        data: { id: id },
                        dataType: 'json',
                        success: function(data) {
                            alert(data.message);
                            loadPlayers();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
