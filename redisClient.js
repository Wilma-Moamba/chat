// redisClient.js
const Redis = require("ioredis");

// Cria e exporta uma instância do Redis
const redis = new Redis(); // por padrão, conecta em 127.0.0.1:6379

module.exports = redis;
