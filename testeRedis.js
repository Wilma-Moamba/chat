import Redis from 'ioredis';

const redis = new Redis();

redis.set('mensagem', 'Olá mundo!');
redis.get('mensagem', (err, result) => {
  if (err) {
    console.error(err);
    return;
  }
  console.log(result);
  redis.disconnect(); // opcional, fecha conexão
});
