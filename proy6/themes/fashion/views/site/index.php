
				<div class="content">
					<div class="center">
						<div class="gallery">								
							<div class="scrollable" id="browsable">   
							   <div class="items">
									<div class="item">
										<img src="images/img4.jpg" alt="" class="slide-img"/>
									</div>
									<div class="item">
										<img src="images/img3.jpg" alt="" class="slide-img"/>
									</div>
									<div class="item">
										<img src="images/img4.jpg" alt="" class="slide-img"/>
									</div>
									<div class="item">
										<img src="images/img3.jpg" alt="" class="slide-img"/>
									</div>	  
							   </div>  
							</div>
							<div class="navi"></div>
							<a href="#" class="browse prev"></a>
							<a href="#" class="browse next"></a>
							<script>
							// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
							$(document).ready(function() {

							// initialize scrollable together with the navigator plugin
							$("#browsable").scrollable().navigator();	
							});
							</script>
						</div>
						<div class="block">
							<div class="post">
                                                            <h1><?= $content_page->title ?></h1>
                                                            <?= $content_page->content ?> 
								</div>
						</div>
						<div class="block">
							<h3>Предварительная запись</h3>
							<form>
								<div class="form-row"><div class="label">Имя*:</div><input type="text" class="text-inp"/></div>
								<div class="form-row"><div class="label">Телефон*:</div><input type="text" class="text-inp"/></div>
								<div class="form-row"><div class="label">Желаемое время:</div><select class="styled"><option>день(12-17)</option></select></div>
								<div class="form-row"><div class="label">Мастер:</div><select class="styled"><option>Степанова</option></select></div>
								<div class="form-row"><div class="label">Комментарий:</div><textarea></textarea></div>
								<div class="form-row captcha"><p>Введите символы, которые Вы видите на картинке:</p><img src="images/capt.jpg" alt="" class="captcha-img"/><a href="#" class="refresh"></a><input type="text" class="text-inp"/></div>
								<div class="form-row"><div class="label"></div><input type="submit" class="submit" value="Отправить" /></div>
								<div class="clear"></div>
							</form>
						</div>
					</div>
					<div class="right-col">
						<div class="side-gall">
							<img src="images/img1.jpg" alt=""/>
							<div class="img-text">
								<h4>Свадебные прически</h4>
								<a href="#" class="more">Посмотреть всю галерею</a>
							</div>
						</div>
						<div class="block">
							<h3>Акции</h3>
							<div class="new">
								<div class="new-img"><img src="images/img2.jpg" alt=""/><span></span><div class="labl">-5%</div></div>
								<div class="new-text">
									<a href="#" class="new-title">Обжиг волос ОГНЁМ!</a>
									<p>Эксклюзивная процедура для волос! "Fire Cut" или "Обжиг Огнём"! Забудьте о тонких, поврежденных и секущихся волосах! </p>
								</div>
							</div>
							<a href="#" class="more">Все акции</a>
						</div>
						<div class="block">
							<h3>статьи</h3>
							<div class="new">
								<div class="new-text">
									<a href="#" class="new-title">Маски для лица - незаменимое средство ухода за кожей</a>
									<p>Эксклюзивная процедура для волос! "Fire Cut" или "Обжиг Огнём"! Забудьте о тонких, поврежденных и ...</p>
								</div>
							</div>
							<div class="new">
								<div class="new-text">
									<a href="#" class="new-title">Маски для лица - незаменимое средство ухода за кожей</a>
									<p>Эксклюзивная процедура для волос! "Fire Cut" или "Обжиг Огнём"! Забудьте о тонких, поврежденных и ...</p>
								</div>
							</div>
							<a href="#" class="more">Все статьи</a>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<div class="block">
						<h3>Новости</h3>
						<div class="new">
							<div class="new-img"><img src="images/img2.jpg" alt=""/><span></span></div>
							<div class="new-text">
								<a href="#" class="new-title">The Vogue 120: герои модной индустрии</a>
								<div class="date">Вт., 25 сент. 2012</div>
								<p>Милые леди и модные джентльмены! Встречайте новую коллекцию одежды, обуви и аксессуаров в... </p>
							</div>
						</div>
						<div class="new">
							<div class="new-img"><img src="images/img2.jpg" alt=""/><span></span></div>
							<div class="new-text">
								<a href="#" class="new-title">The Vogue 120: герои модной индустрии</a>
								<div class="date">Вт., 25 сент. 2012</div>
								<p>Милые леди и модные джентльмены! Встречайте новую коллекцию одежды, обуви и аксессуаров в... </p>
							</div>
						</div>
						<div class="new">
							<div class="new-text">
								<a href="#" class="new-title">The Vogue 120: герои модной индустрии</a>
								<div class="date">Вт., 25 сент. 2012</div>
								<p>Милые леди и модные джентльмены! Встречайте каталоге Heine сезона осень-зима2012/2013! Новая пора года – новый стиль, новые решения в цветовой гамме и фасоне, на любой...  </p>
							</div>
						</div>
					</div>
					<div class="block weather">
						<h3>Погода</h3>
						<img src="images/weather.jpg" alt=""/>
					</div>
				</div>
			