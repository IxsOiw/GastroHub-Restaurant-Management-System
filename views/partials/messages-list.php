<div class="card">
    <div class="card-header">
        <div class="card-title">Správy od hostí</div>
    </div>
    <div class="card-body">
        <div class="msg-list">
            <?php if (empty($messages)): ?>
                <p style="color:#aaa; padding:16px;">Žiadne správy.</p>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                    <div class="msg-item">
                        <div class="msg-dot <?= $msg['is_read'] ? 'read' : '' ?>"></div>
                        <div>
                            <div class="msg-name"><?= htmlspecialchars($msg['name']) ?></div>
                            <div class="msg-text"><?= htmlspecialchars($msg['message']) ?></div>
                        </div>
                        <div class="msg-time"><?= date('H:i', strtotime($msg['created_at'])) ?></div>
                        <form method="POST" action="/admin/messages/delete" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $msg['message_id'] ?>">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Zmazať správu?')">✖</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
