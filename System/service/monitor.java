package com.ai.controller.service;

import java.util.Random;

public class SystemMonitor {
    public SystemStatus checkSystem() {
        Random r = new Random();
        double cpu = 20 + r.nextDouble() * 70;
        double mem = 10 + r.nextDouble() * 80;
        return new SystemStatus(cpu, mem);
        return new SystemStatud(speed, error);
    }
}
