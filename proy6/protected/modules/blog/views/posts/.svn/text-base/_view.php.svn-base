<div class="post">
    <div class="title">
        <?php echo CHtml::link(CHtml::encode($data->title), $data->PostLink); ?>
    </div>
    <div class="author">
        posted by <?php echo $data->user->email . ' on ' . $data->create_time;       ?>
    </div>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $data->content;
        $this->endWidget();
        ?>
    </div>
    <div class="nav">
        <b>Category:</b>
        <?php echo $data->categorylinks; ?>
        <b>Tags:</b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php // var_dump($data);?>
        <?php echo CHtml::link('Permalink', $data->PostLink); ?> |
        <?php echo CHtml::link("Comments ({$data->commentCount})", $data->PostLink . '#comments'); ?> |
        Last updated on <?php echo $data->update_time; ?>
    </div>
</div>
