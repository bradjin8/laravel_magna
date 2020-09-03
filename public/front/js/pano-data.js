var APP_DATA = {
  "scenes": [
    {
      "id": "0-welcomedesk",
      "name": "Welcome Desk",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2048,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0.001,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": -1.2319545801663736,
          "pitch": 0.22964921079222655,
          "rotation": 0,
          "target": "1-magnaleft360"
        },
        {
          "yaw": 1.3914099566296442,
          "pitch": 0.19388140890871597,
          "rotation": 0,
          "target": "2-magnaright360"
        }
      ],
      "infoHotspots": [
        {
          "yaw": 0.605,
          "pitch": -0.39,
          "title": "Magna Corporate",
          "text": "Some text"
        }
      ]
    },
    {
      "id": "1-magnaleft360",
      "name": "West Wing",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2048,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 1,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": -1.0322164738975363,
          "pitch": 0.09726511661880011,
          "rotation": 1.55,
          "target": "2-magnaright360"
        },
        {
          "yaw": 0.8799027744074159,
          "pitch": 0.0691021217465817,
          "rotation": -1.55,
          "target": "0-welcomedesk"
        }
      ],
      "infoHotspots": []
    },
    {
      "id": "2-magnaright360",
      "name": "East Wing",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2048,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 1,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": 0.9858778926380225,
          "pitch": 0.08537964630252404,
          "rotation": -1.6,
          "target": "1-magnaleft360"
        },
        {
          "yaw": -0.9572856193303956,
          "pitch": 0.10125561708951523,
          "rotation": 1.5,
          "target": "0-welcomedesk"
        }
      ],
      "infoHotspots": []
    }
  ],
  "name": "Magna Virtual Innovation Showroom",
  "settings": {
    "mouseViewMode": "drag",
    "autorotateEnabled": false,
    "fullscreenButton": false,
    "viewControlButtons": false
  }
};
