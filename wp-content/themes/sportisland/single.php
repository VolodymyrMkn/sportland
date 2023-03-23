<?php get_header() ?>
<main class="main-content">
    <div class="wrapper">
        <ul class="breadcrumbs">
            <?php get_template_part('template-parts/breadcrumbs') ?>
    </div>
    <article class="main-article wrapper">
        <header class="main-article__header">
            <?php the_post_thumbnail('full', ['class' => "main-article__thumb" ] );?>
            <h1 class="main-article__h"><?php the_title() ?></h1>
        </header>
        <p> <?php echo get_the_content(); ?> </p>
        <footer class="main-article__footer">
            <time datetime="<?php echo get_the_date('Y-m-d') ?>"><?php echo get_the_date('Y-m-d') ?></time>
            <button
                    class="main-article__like like"
                    data-id = "<?php echo get_the_ID(); ?>"
                    data-href = "<?php echo admin_url('admin-ajax.php'); ?>"> </button>>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 51.997 51.997" style="enable-background:new 0 0 51.997 51.997;" xml:space="preserve">
              <style> path{
                      fill: #666;
                  }
              </style>
                    <path d="M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905
	c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478
	c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014
	C52.216,18.553,51.97,16.611,51.911,16.242z" />
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
            </svg>
                <span class="like__text">Нравится </span>
                <span class="like__count"><?php
                    $id = get_the_ID();
                    $likes = get_post_meta($id, 'si-like', true);
                    echo $likes ? $likes : 0;?></span>
            </button>
        </footer>
        <script>
            window.addEventListener('load', function (){
                const likeBtn = document.querySelector('.like')
                const postId = likeBtn.dataset.id
                if(!localStorage.getItem('liked')){
                    localStorage.setItem('liked', '')
                }
                function getLike(id){
                    let hasLike = false
                    hasLike = localStorage.getItem('liked').split(',').includes(id)
                    return hasLike
                }
                let hasLike = getLike(postId)
                // console.log(hasLike)
                if(hasLike){
                    likeBtn.classList.add('like_liked')
                }
                likeBtn.addEventListener('click', async function (e){
                    e.preventDefault()
                    // console.log(e)
                    let hasLike = getLike(postId)
                   // console.log(hasLike)
                    const data = new FormData()
                    data.append('id', postId)
                    let todo = hasLike ? 'minus' : 'plus'
                    data.append('todo', todo)
                    data.append('action', 'like')
                    likeBtn.disabled = true
                    // console.log(...data)
                    let response = await fetch(likeBtn.dataset.href, {
                        method: 'POST',
                        body: data
                    })
                    likeBtn.disabled = false
                    // console.log(response)
                    if(response.status===200){
                        let result = await response.text()
                       // console.log(result)
                        likeBtn.querySelector('.like__count').textContent=result
                        let localData = localStorage.getItem('liked')
                        let newData = ''
                        if(hasLike) {
                            newData = localData.split(',').filter(function (id){
                                return id !== postId
                            }).join(',')
                        } else {
                            newData = localData.split(',').filter(function (item){
                                return item !== ''
                            }).concat(postId).join(',')
                        }
                        localStorage.setItem('liked', newData)
                        likeBtn.classList.toggle('like_liked')
                    }
                })
            })
        </script>
    </article>
</main>
<?php get_template_part('template-parts/modal-forms') ?>

<?php get_footer() ?>


