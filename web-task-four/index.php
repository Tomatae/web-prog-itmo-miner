<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require_once('xml_utils.php');
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Броневик</title>
</head>
<body>
  <div style="position: absolute;">
	   <a href="list.php">list.php</a><br>
	   <a href="create.php">create.php</a><br>
	   <a href="delete.php">delete.php</a><br>
  </div>

  <div class="body-wrapper">
    <header>
      <div class="header-logo">
        <div id="logo"></div>
      </div>
      <div class="header-options">
        <div class="options"><a href="#">Настройки</a></div>
      </div>
    </header>
    <div class="main">
      <menu class="sidebar">
        <ul class="sidebar-menu">
          <li class="sidebar-menu-option"><a href="#">Профиль</a></li>
          <li class="sidebar-menu-option"><a href="#">Друзья</a></li>
          <li class="sidebar-menu-option"><a href="#">Фотографии</a></li>
          <li class="sidebar-menu-option"><a href="#">Видеозаписи</a></li>
          <li class="sidebar-menu-option"><a href="#">Аудиозаписи</a></li>
          <li class="sidebar-menu-option"><a href="#">Сообщения</a></li>
          <li class="sidebar-menu-option"><a href="#">Сообщества</a></li>
          <li class="sidebar-menu-option"><a href="#">Новости</a></li>
        </ul>
      </menu>

      <content>
        <div class="title-section">
          <span class="username">
						<?php
							$id = $_GET['id'] ?? '0';
              $id = !isTaken($id) ? '0' : $id;
              echo (getById($id)->name);
						?>
          </span>
          <span class="network_status">Сетевой статус</span>
        </div>
        <div class="main-profile">
          <div class="main-profile-left">
            <div class="avatar" src="../media/logo-main.jpg"></div>
            <div class="communication-section">
              <div class="send_message">Написать сообщение</div>
              <div class="add_friend">Добавить в друзья</div>
            </div>

            <div class="subscribers-section">
              <div class="amount">Количество подписчиков</div>
              <div class="news">Новости</div>
            </div>

            <div class="friends-section">
              <div class="friends-title">Друзья</div>
              <div class="friends">
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
              </div>
            </div>

            <div class="friends-online-section">
              <div class="friends-title">Друзья онлайн</div>
              <div class="friends">
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
                <div class="friend-photo"></div>
              </div>
              <div class="friends"></div>
            </div>
          </div>

          <div class="main-profile-right">
            <div class="user-status-section">Статус</div>
            <div class="user-info-section">
              <p>Город:
								<?php
									$id = $_GET['id'] ?? '0';
                  $id = !isTaken($id) ? '0' : $id;
									echo (getById($id)->city);
								?>
							</p>
              <p>День рождения:
								<?php
									$id = $_GET['id'] ?? '0';
                  $id = !isTaken($id) ? '0' : $id;
									echo (getById($id)->birth);
								?>
							</p>
              <p>Семейное положение:</p>

              <div class="user-extended">Показать подробную информацию</div>
            </div>

            <div class="photo-section">
              <div class="photo-title">Фотографии</div>

              <div class="photos">
                <div></div>
                <div></div>
                <div></div>
              </div>
            </div>

            <div class="posts-section">
              <div class="posts-section-title">
                <div class="posts-count">Количество записей</div>
                <div class="posts-search">Поиск</div>
              </div>

              <div class="posts-section-items">
                <div class="post">
                  <div class="post-photo"></div>
                  <div class="post-body">
                    <div class="post-title">
										<?php
                      $id = $_GET['id'] ?? '0';
                      $id = !isTaken($id) ? '0' : $id;
                      $id = isTaken($id+1) ? $id + 1 : '0';
											echo (getById($id)->name);
										?>
                  </div>
                  <div class="post-content">Пацаны гоняют, но не загоняются!</div>
                </div>
              </div>

              <div class="post">
                <div class="post-photo"></div>
                <div class="post-body">
                  <div class="post-title">
										<?php
											$id = $_GET['id'] ?? '0';
                      $id = !isTaken($id) ? '0' : $id;
                      $id = isTaken($id+1) ? $id + 1 : '0';
											echo (getById($id)->name);
										?>
                  </div>
                  <div class="post-content">Зачем ты добавил меня к себе в работу? А цитатку?</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </content>
  </div>
</div>
</body>
</html>
